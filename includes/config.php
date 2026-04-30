<?php
/**
 * Zentrale Konfiguration — TOS Handler e.K.
 * Sensible Werte (SMTP-Passwort) kommen aus Umgebungsvariablen, nicht aus dieser Datei.
 */

declare(strict_types=1);

// NAP-Daten (Name, Address, Phone) — konsistent in Footer, Impressum, Kontakt, Schema.org
define('SITE_NAME',        'TOS Handler e.K.');
define('SITE_URL',         'https://tos-handler.de');
define('CONTACT_STREET',   'Munketoft 1');
define('CONTACT_ZIP',      '24941');
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
define('MAIL_FROM', 'noreply@tos-handler.de');

// SMTP-Konfiguration — Werte aus Umgebungsvariablen
define('SMTP_HOST',     getenv('SMTP_HOST')     ?: 'localhost');
define('SMTP_PORT',     (int)(getenv('SMTP_PORT') ?: 587));
define('SMTP_USER',     getenv('SMTP_USER')     ?: '');
define('SMTP_PASS',     getenv('SMTP_PASS')     ?: '');
define('SMTP_SECURE',   getenv('SMTP_SECURE')   ?: 'tls');

// Galerie-Basis-Pfad
define('IMG_PROJEKTE', '/assets/img/projekte/');
