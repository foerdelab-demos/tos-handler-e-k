<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

// Honeypot prüfen
if (!empty($_POST['website'])) {
    http_response_code(400);
    exit;
}

// Nur POST erlauben
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . site_path('/') . '#kontakt');
    exit;
}

// Eingaben bereinigen
$name      = trim(strip_tags($_POST['name']      ?? ''));
$email     = trim(strip_tags($_POST['email']     ?? ''));
$telefon   = trim(strip_tags($_POST['telefon']   ?? ''));
$quelle    = trim(strip_tags($_POST['quelle']    ?? ''));
$anfrage   = trim(strip_tags($_POST['anfrage']   ?? ''));
$datenschutz = isset($_POST['datenschutz']);

// Server-seitige Validierung
$errors = [];

if (empty($name)) {
    $errors[] = 'Name fehlt.';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Gültige E-Mail-Adresse fehlt.';
}

if (empty($anfrage) || mb_strlen($anfrage) < 10) {
    $errors[] = 'Anfrage muss mindestens 10 Zeichen enthalten.';
}

if (!$datenschutz) {
    $errors[] = 'Datenschutzerklärung muss bestätigt werden.';
}

if (!empty($errors)) {
    header('Location: ' . site_path('/') . '?fehler=1#kontakt');
    exit;
}

$subject = 'Neue Anfrage von ' . $name . ' über tos-handler.de';
$body  = "Name:      {$name}\n";
$body .= "E-Mail:    {$email}\n";
if (!empty($telefon)) {
    $body .= "Telefon:   {$telefon}\n";
}
if (!empty($quelle)) {
    $body .= "Quelle:    {$quelle}\n";
}
$body .= "\nAnfrage:\n{$anfrage}\n";

// Versand über Mailgun, wenn auf dem Server eingerichtet. „Antworten“ im Mailprogramm
// geht direkt an die Adresse aus dem Formular (Reply-To).
$mailgun = (MAILGUN_CONFIG_FILE !== '' && is_file(MAILGUN_CONFIG_FILE)) ? (array) require MAILGUN_CONFIG_FILE : [];
if (!empty($mailgun['MAILGUN_API_KEY']) && !empty($mailgun['MAILGUN_DOMAIN']) && function_exists('curl_init')) {
    $replyName = trim(preg_replace('/[\r\n"<>,;]+/', ' ', $name) ?? '');
    $fromName  = (string) ($mailgun['MAILGUN_FROM_NAME'] ?? SITE_NAME);
    $ch = curl_init(rtrim((string) ($mailgun['MAILGUN_API_BASE'] ?? 'https://api.eu.mailgun.net'), '/')
        . '/v3/' . rawurlencode((string) $mailgun['MAILGUN_DOMAIN']) . '/messages');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_USERPWD        => 'api:' . $mailgun['MAILGUN_API_KEY'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_POSTFIELDS     => http_build_query([
            'from'       => $fromName . ' <' . $mailgun['MAILGUN_FROM_EMAIL'] . '>',
            'to'         => MAIL_TO,
            'subject'    => $subject,
            'text'       => $body,
            'h:Reply-To' => ($replyName !== '' ? $replyName . ' ' : '') . '<' . $email . '>',
        ]),
    ]);
    $antwort = curl_exec($ch);
    $status  = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    $fehler  = curl_error($ch);
    curl_close($ch);

    if ($status >= 200 && $status < 300) {
        header('Location: ' . site_path('/') . '?gesendet=1#kontakt');
        exit;
    }
    error_log('[TOS Kontaktformular] Mailgun-Fehler ' . $status . ': ' . ($fehler !== '' ? $fehler : substr((string) $antwort, 0, 200)));
    header('Location: ' . site_path('/') . '?fehler=1#kontakt');
    exit;
}

// Rückfall: PHPMailer über SMTP
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = SMTP_SECURE === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom(MAIL_FROM, SITE_NAME);
    $mail->addReplyTo($email, $name);
    $mail->addAddress(MAIL_TO, SITE_NAME);

    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();

    header('Location: ' . site_path('/') . '?gesendet=1#kontakt');
    exit;

} catch (Exception $e) {
    // Fehler loggen (kein Stack-Trace an den Nutzer)
    error_log('[TOS Kontaktformular] Mailer-Fehler: ' . $mail->ErrorInfo);
    header('Location: ' . site_path('/') . '?fehler=1#kontakt');
    exit;
}
