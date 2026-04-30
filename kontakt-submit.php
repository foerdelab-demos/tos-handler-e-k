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
    header('Location: /kontakt');
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
    header('Location: /kontakt?fehler=1');
    exit;
}

// PHPMailer
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

    $mail->Subject = 'Neue Anfrage von ' . $name . ' über tos-handler.de';

    $body  = "Name:      {$name}\n";
    $body .= "E-Mail:    {$email}\n";
    if (!empty($telefon)) {
        $body .= "Telefon:   {$telefon}\n";
    }
    if (!empty($quelle)) {
        $body .= "Quelle:    {$quelle}\n";
    }
    $body .= "\nAnfrage:\n{$anfrage}\n";

    $mail->Body = $body;

    $mail->send();

    header('Location: /kontakt?gesendet=1');
    exit;

} catch (Exception $e) {
    // Fehler loggen (kein Stack-Trace an den Nutzer)
    error_log('[TOS Kontaktformular] Mailer-Fehler: ' . $mail->ErrorInfo);
    header('Location: /kontakt?fehler=1');
    exit;
}
