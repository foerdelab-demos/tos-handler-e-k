<?php
/**
 * header.php — <head>-Block, Skip-Link, Top-Navigation, Logo
 * Wird am Anfang jeder Seite per require_once eingebunden.
 *
 * Erwartet (im aufrufenden Skript gesetzt):
 *   $page_title       string
 *   $page_description string
 *   $page_canonical   string
 *   $body_class       string  optional — zusaetzliche Klassen fuer <body>
 */

declare(strict_types=1);
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script>document.documentElement.classList.add('js-reveal');</script>

  <!-- Schriften: Fraunces (Display) + IBM Plex Sans (Body) + IBM Plex Mono (Akzent) -->
  <link rel="preload" href="<?php echo htmlspecialchars(asset_path('fonts/Fraunces-VariableFont.woff2'), ENT_QUOTES, 'UTF-8'); ?>" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo htmlspecialchars(asset_path('fonts/IBMPlexSans-Regular.woff2'), ENT_QUOTES, 'UTF-8'); ?>" as="font" type="font/woff2" crossorigin>

  <!-- Kritisches CSS inline, Rest als externem Stylesheet -->
  <style>
    /* Kritisches CSS — verhindert FOUC */
    @font-face {
      font-family: 'Fraunces';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/Fraunces-VariableFont.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2-variations');
      font-weight: 100 900;
      font-display: swap;
      font-style: normal;
    }
    @font-face {
      font-family: 'IBM Plex Sans';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/IBMPlexSans-Regular.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2');
      font-weight: 400;
      font-display: swap;
    }
    @font-face {
      font-family: 'IBM Plex Sans';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/IBMPlexSans-Medium.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2');
      font-weight: 500;
      font-display: swap;
    }
    @font-face {
      font-family: 'IBM Plex Sans';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/IBMPlexSans-SemiBold.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2');
      font-weight: 600;
      font-display: swap;
    }
    @font-face {
      font-family: 'IBM Plex Sans';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/IBMPlexSans-Bold.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2');
      font-weight: 700;
      font-display: swap;
    }
    @font-face {
      font-family: 'IBM Plex Mono';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/IBMPlexMono-Regular.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2');
      font-weight: 400;
      font-display: swap;
    }
    @font-face {
      font-family: 'IBM Plex Mono';
      src: url('<?php echo htmlspecialchars(asset_path('fonts/IBMPlexMono-Medium.woff2'), ENT_QUOTES, 'UTF-8'); ?>') format('woff2');
      font-weight: 500;
      font-display: swap;
    }

    :root {
      --paper: #f2ede4;
      --ink: #1c1a16;
      --font-display: 'Fraunces', Georgia, serif;
      --font-body: 'IBM Plex Sans', -apple-system, sans-serif;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { background: var(--paper); color: var(--ink); font-family: var(--font-body); }
    body { background: var(--paper); }
  </style>

  <link rel="stylesheet" href="<?php echo htmlspecialchars(asset_path('css/main.css'), ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="stylesheet" href="<?php echo htmlspecialchars(asset_path('css/print.css'), ENT_QUOTES, 'UTF-8'); ?>" media="print">

  <?php require_once __DIR__ . '/meta.php'; ?>
</head>
<body class="<?php echo htmlspecialchars($body_class ?? '', ENT_QUOTES, 'UTF-8'); ?>">

<!-- Skip-Link fuer Tastaturnutzer -->
<a class="skip-link" href="#main-content">Zum Hauptinhalt</a>

<?php require_once __DIR__ . '/nav.php'; ?>
