<?php
/**
 * Zentrale Konfiguration — TOS Handler e.K.
 * Sensible Werte (SMTP-Passwort) kommen aus Umgebungsvariablen, nicht aus dieser Datei.
 */

declare(strict_types=1);

$scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
$scriptDir = str_replace('\\', '/', $scriptDir);
if ($scriptDir === '.' || $scriptDir === '/' || $scriptDir === '\\') {
	$scriptDir = '';
}
if ($scriptDir !== '' && $scriptDir[0] !== '/') {
	$scriptDir = '/' . $scriptDir;
}

define('SITE_BASE_PATH', rtrim(getenv('SITE_BASE_PATH') ?: $scriptDir, '/'));

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? '';
$detectedSite = $host !== '' ? ($scheme . '://' . $host) : 'https://tos-handler.de';

// NAP-Daten (Name, Address, Phone) — konsistent in Footer, Impressum, Kontakt, Schema.org
define('SITE_NAME',        'TOS Handler e.K.');
define('SITE_URL',         rtrim(getenv('SITE_URL') ?: ($detectedSite . SITE_BASE_PATH), '/'));
// Hauptadresse ist das Büro (Kundenwunsch 16.11.2026). Die Straße heißt laut OpenStreetMap
// „Waitzstraße“ (24937 Flensburg), nicht „Weitzstraße“.
define('CONTACT_STREET',   'Waitzstraße 10');
define('CONTACT_ZIP',      '24937');
// Zweiter Standort: Lager & Werkstatt
define('LAGER_STREET',     'Munketoft 1');
define('LAGER_ZIP',        '24941');
define('CONTACT_CITY',     'Flensburg');
define('CONTACT_PHONE',    '0461 - 9788 - 7885');
define('CONTACT_PHONE_TEL', '+4946197887885');
define('CONTACT_FAX',      '0461 - 9788 - 9934');
define('CONTACT_MOBILE',   '0151 - 1443 - 1526');
define('CONTACT_EMAIL',    'info@tos-handler.de');

// Impressum
define('REG_NR',  'HRA 8676 FL');
define('UST_ID',  'DE 260 999 553');
define('VERTRETEN_DURCH', 'Knebel-Handler, Tilman');

// Mail-Empfänger
define('MAIL_TO',   CONTACT_EMAIL);
define('MAIL_FROM', CONTACT_EMAIL); // Absender ist das Postfach info@ (kein noreply)

// Versand über Mailgun (bevorzugt): Die Zugangsdaten liegen außerhalb des Webroots in einer
// PHP-Datei, die ein Array mit MAILGUN_API_KEY, MAILGUN_DOMAIN, MAILGUN_API_BASE,
// MAILGUN_FROM_EMAIL und MAILGUN_FROM_NAME zurückgibt. Fehlt die Datei, greift SMTP (unten).
// Der Pfad kommt aus der Umgebungsvariable MAILGUN_CONFIG_FILE (live im Apache-Eintrag gesetzt).
define('MAILGUN_CONFIG_FILE', (string) (getenv('MAILGUN_CONFIG_FILE') ?: ''));

// SMTP-Konfiguration (Rückfall) — Werte aus Umgebungsvariablen
define('SMTP_HOST',     getenv('SMTP_HOST')     ?: 'localhost');
define('SMTP_PORT',     (int)(getenv('SMTP_PORT') ?: 587));
define('SMTP_USER',     getenv('SMTP_USER')     ?: '');
define('SMTP_PASS',     getenv('SMTP_PASS')     ?: '');
define('SMTP_SECURE',   getenv('SMTP_SECURE')   ?: 'tls');

/**
 * Baut interne URLs basierend auf dem aktuellen Deploy-Pfad (Root oder Unterordner).
 */
function site_path(string $path = '/'): string
{
	$normalized = ($path === '' || $path === '/') ? '/' : '/' . ltrim($path, '/');
	return SITE_BASE_PATH === '' ? $normalized : SITE_BASE_PATH . $normalized;
}

/**
 * Baut Asset-URLs innerhalb von /assets.
 */
function asset_path(string $asset): string
{
	return site_path('/assets/' . ltrim($asset, '/'));
}

/**
 * Asset-URL mit Versionsparameter aus dem Änderungsdatum der Datei. Ohne ihn liefert
 * Cloudflare nach einem Update noch stundenlang das alte CSS/JS aus dem Zwischenspeicher.
 */
function asset_path_v(string $asset): string
{
	$datei = dirname(__DIR__) . '/assets/' . ltrim($asset, '/');
	return asset_path($asset) . (is_file($datei) ? '?v=' . filemtime($datei) : '');
}

// Galerie-Basis-Pfad
define('IMG_PROJEKTE', site_path('/assets/img/projekte/'));
