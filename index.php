<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Gebäudesanierung, Gebäudetechnik & Renovierung Flensburg | TOS Handler e.K.';
$page_description = 'TOS Handler e.K., Meisterfachbetrieb in Flensburg. Gebäudesanierung, Gebäudetechnik und Renovierung aus einer Hand: ehrlich beraten, technisch und wirtschaftlich die beste Lösung für Sie.';
$page_canonical   = '/';
$body_class       = 'page-home';

$bewertungen = require __DIR__ . '/data/bewertungen.php';
$leistungen  = require __DIR__ . '/data/leistungen.php';
$projekteFeed = require __DIR__ . '/data/projekte-feed.php';

// Alt-Texte aus der Galerie-Liste übernehmen (Datei → Beschreibung)
$bildAlt = [];
foreach (require __DIR__ . '/data/projekte.php' as $g) {
    $bildAlt[$g['file']] = $g['title'];
}

$summary     = $bewertungen['summary'];
$reviews     = array_values(array_filter($bewertungen['reviews'], fn(array $r): bool => $r['aktiv'] ?? true));

$gesendet = isset($_GET['gesendet']) && $_GET['gesendet'] === '1';
$fehler   = isset($_GET['fehler']);

/** Escaped Text, in dem [[Begriffe]] rot hervorgehoben werden. */
function hl_text(string $text): string
{
    $safe = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    return preg_replace('/\[\[(.+?)\]\]/u', '<mark class="hl">$1</mark>', $safe) ?? $safe;
}

/** n gefüllte Sterne als SVG. */
function stars_svg(int $n): string
{
    $star = '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.56 5.82 22 7 14.14l-5-4.87 6.91-1.01z"/></svg>';
    return '<span class="stars" aria-label="' . $n . ' von 5 Sternen">' . str_repeat($star, max(0, min(5, $n))) . '</span>';
}

function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

const FEED_PHASEN = [
    'ergebnis'   => 'Ergebnis',
    'vorher'     => 'Vorher',
    'bau'        => 'Im Bau',
    'fastfertig' => 'Fast fertig',
];

/**
 * Bilder eines Projekts in Erzählreihenfolge:
 * Ergebnis → Vorher → Im Bau → Fast fertig → Ergebnis.
 * Liefert [[Datei, Phase, Bildunterschrift], …]; Phase '' wenn das Projekt nur
 * Ergebnisbilder hat. Ein Bild ist 'datei' oder ['datei', 'Bildunterschrift'].
 */
function feed_slides(array $pr): array
{
    $norm = fn(array $list): array => array_map(
        fn($b) => is_array($b) ? [$b[0], (string)($b[1] ?? '')] : [$b, ''],
        $list
    );
    $erg = $norm($pr['ergebnis'] ?? $pr['bilder'] ?? []);
    $vor = $norm($pr['vorher'] ?? []);
    $bau = $norm($pr['bau'] ?? []);
    $ff  = $norm($pr['fastfertig'] ?? []);
    $mehrerePhasen = ($vor || $bau || $ff);

    $slides = [];
    if ($erg) {
        $slides[] = [$erg[0][0], 'ergebnis', $erg[0][1]];
    }
    foreach ($vor as $b) { $slides[] = [$b[0], 'vorher', $b[1]]; }
    foreach ($bau as $b) { $slides[] = [$b[0], 'bau', $b[1]]; }
    foreach ($ff as $b)  { $slides[] = [$b[0], 'fastfertig', $b[1]]; }
    $rest = array_slice($erg, 1);
    if ($rest) {
        foreach ($rest as $b) { $slides[] = [$b[0], 'ergebnis', $b[1]]; }
    } elseif ($erg && $mehrerePhasen) {
        $slides[] = [$erg[0][0], 'ergebnis', $erg[0][1]]; // am Ende wieder das Endergebnis
    }
    if (!$mehrerePhasen) {
        $slides = array_map(fn($sl) => [$sl[0], '', $sl[2]], $slides);
    }
    return $slides;
}

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <!-- ===================================================================
       HERO — zweispaltig: Botschaft links, Leistungs-Index rechts.
       Klasse "hero--verlauf" = optionaler, kaum sichtbarer Verlauf Creme → Hellcreme.
       Zum Abschalten einfach die Klasse entfernen.
       =================================================================== -->
  <section class="hero hero--verlauf" aria-labelledby="hero-heading">
    <div class="container">
      <!-- Original-Logo des Kunden, zentriert über dem Hero -->
      <div class="hero__brand">
        <img src="<?php echo e(asset_path('img/logo-tilman-handler.png')); ?>"
             alt="Tilman Handler, technischer objekt-service"
             width="1588" height="1116"
             loading="eager" decoding="sync" fetchpriority="high"
             class="hero__logo">
      </div>

    <div class="hero__grid">
      <div class="hero__content">
        <p class="eyebrow" data-reveal="left">Fachbetrieb in Flensburg</p>
        <h1 id="hero-heading" class="hero__headline" data-reveal="up">Alles aus <span class="hl">einer Hand.</span></h1>
        <p class="hero__subline" data-reveal="up" data-reveal-delay="1">
          Wir beraten Sie ehrlich und kundenorientiert, planen Ihr Projekt mit Fachkenntnis,
          um die <span class="hl">technisch und wirtschaftlich beste Lösung</span> für Sie zu finden.
        </p>
        <div class="hero__actions" data-reveal="up" data-reveal-delay="2">
          <a href="#kontakt" class="btn btn--primary">Beratung anfragen</a>
          <a href="tel:<?php echo CONTACT_PHONE_TEL; ?>" class="hero__tel">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true" focusable="false">
              <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.18 2 2 0 012 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"/>
            </svg>
            <?php echo e(CONTACT_PHONE); ?>
          </a>
        </div>
      </div>

      <nav id="leistungen" class="hero__index" aria-label="Unsere Leistungsbereiche" data-reveal="up" data-reveal-delay="2">
        <a href="#dialog-gebaeudesanierung" class="index-row" data-open-dialog aria-haspopup="dialog">
          <span class="index-row__body">
            <span class="index-row__title">Gebäude&shy;sanierung</span>
          </span>
          <span class="index-row__arrow" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </span>
        </a>
        <a href="#dialog-gebaeudetechnik" class="index-row" data-open-dialog aria-haspopup="dialog">
          <span class="index-row__body">
            <span class="index-row__title">Gebäude&shy;technik</span>
          </span>
          <span class="index-row__arrow" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </span>
        </a>
        <a href="#dialog-renovierung" class="index-row" data-open-dialog aria-haspopup="dialog">
          <span class="index-row__body">
            <span class="index-row__title">Renovierung</span>
          </span>
          <span class="index-row__arrow" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </span>
        </a>
      </nav>
    </div><!-- /.hero__grid -->
    </div>
  </section>

  <!-- ===================================================================
       GOOGLE-BEWERTUNGEN (Daten: data/bewertungen.php)
       =================================================================== -->
  <section id="bewertungen" class="section bewertungen" aria-labelledby="bewertungen-heading">
    <div class="container">
      <div class="bewertungen__head">
        <div>
          <p class="eyebrow" data-reveal="left">Das sagen unsere Kunden</p>
          <h2 id="bewertungen-heading" data-reveal="up">Google-Bewertungen</h2>
        </div>
        <div class="bewertungen__score" data-reveal="up" data-reveal-delay="1">
          <?php if ($summary['score'] !== ''): ?>
          <span class="bewertungen__score-number"><?php echo e($summary['score']); ?></span>
          <?php endif; ?>
          <div class="bewertungen__score-meta">
            <?php echo stars_svg(5); ?>
            <a class="bewertungen__link" href="<?php echo e($summary['url']); ?>" target="_blank" rel="noopener noreferrer">
              <?php echo (int)$summary['count'] > 0 ? (int)$summary['count'] . ' Bewertungen' : 'Alle Bewertungen'; ?> auf Google ansehen
            </a>
          </div>
        </div>
      </div>

      <div class="carousel" data-carousel data-reveal="up" data-reveal-delay="2">
        <ul class="carousel__track" role="list" aria-label="Bewertungen (horizontal scrollbar)" tabindex="0">
          <?php foreach ($reviews as $r): ?>
          <li class="carousel__slide">
            <article class="review-card">
              <div class="review-card__head">
                <span class="review-card__author"><?php echo e($r['author']); ?></span>
                <?php echo stars_svg((int)$r['stars']); ?>
              </div>
              <p class="review-card__meta font-mono"><?php echo e($r['date']); ?> · Google</p>
              <p class="review-card__text" data-clamp>„<?php echo hl_text($r['text']); ?>“</p>
              <?php if (!empty($r['leistungen'])): ?>
              <ul class="chips" role="list" aria-label="Leistungen in dieser Bewertung">
                <?php foreach ($r['leistungen'] as $tag): ?>
                <li class="chip chip--accent"><?php echo e($tag); ?></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </article>
          </li>
          <?php endforeach; ?>
        </ul>
        <div class="carousel__controls">
          <button type="button" class="carousel__btn carousel__btn--prev" aria-label="Vorherige Bewertung">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true" focusable="false"><polyline points="15 18 9 12 15 6"/></svg>
          </button>
          <div class="carousel__dots"></div>
          <button type="button" class="carousel__btn carousel__btn--next" aria-label="Nächste Bewertung">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true" focusable="false"><polyline points="9 18 15 12 9 6"/></svg>
          </button>
        </div>
      </div>
    </div>
  </section>


  <!-- ===================================================================
       PROJEKTE — Feed (Daten: data/projekte-feed.php)
       Handy: jedes Projekt eine Bildschirmhöhe, Bilder seitlich wischen.
       Desktop: vorläufig als Raster (wird später gesondert gestaltet).
       =================================================================== -->
  <section id="projekte" class="section section--feed" aria-labelledby="projekte-heading">
    <div class="container feed__head">
      <p class="eyebrow" data-reveal="left">Projekte</p>
      <h2 id="projekte-heading" data-reveal="up">Unsere Arbeiten</h2>
      <p class="section__subline feed__hint" data-reveal="up-soft" data-reveal-delay="1">Nach unten scrollen für das nächste Projekt, seitlich wischen für weitere Bilder.</p>
    </div>

    <div class="feed">
      <?php $anzahl = count($projekteFeed);
      foreach ($projekteFeed as $pi => $pr):
          $slides = feed_slides($pr);
          $n = count($slides); ?>
      <article class="feed-item" id="projekt-<?php echo $pi + 1; ?>" aria-labelledby="projekt-<?php echo $pi + 1; ?>-title">
        <header class="feed-item__head">
          <p class="feed-item__meta font-mono">
            Projekt <?php echo $pi + 1; ?> von <?php echo $anzahl; ?><?php if (!empty($pr['label'])): ?> · <?php echo e($pr['label']); ?><?php endif; ?>
          </p>
          <h3 id="projekt-<?php echo $pi + 1; ?>-title" class="feed-item__title"><?php echo e($pr['title']); ?></h3>
          <?php if (!empty($pr['text'])): ?>
          <p class="feed-item__text"><?php echo e($pr['text']); ?></p>
          <?php endif; ?>
        </header>
        <div class="feed-item__media<?php echo $n < 2 ? ' is-single' : ''; ?>" data-strip>
          <ul class="feed-item__strip" role="list" aria-label="Bilder zu <?php echo e($pr['title']); ?>">
            <?php foreach ($slides as $bi => [$file, $phase, $caption]):
                $src   = asset_path('img/projekte/' . $file);
                $alt   = $caption !== '' ? $caption : ($bildAlt[$file] ?? $pr['title']);
                $label = $phase !== '' ? FEED_PHASEN[$phase] : '';
                $eager = ($pi === 0 && $bi === 0); ?>
            <li class="feed-item__pic">
              <!-- Querformat-Darstellung (weichgezeichneter Hintergrund) setzt main.js beim Laden -->
              <img src="<?php echo e($src); ?>"
                   alt="<?php echo $label !== '' ? e($label) . ', ' : ''; ?>Bild <?php echo $bi + 1; ?> von <?php echo $n; ?>: <?php echo e($alt); ?>"
                   loading="<?php echo $eager ? 'eager' : 'lazy'; ?>" decoding="async">
              <?php if ($label !== ''): ?>
              <span class="feed-item__phase feed-item__phase--<?php echo e($phase); ?>" aria-hidden="true"><?php echo e($label); ?></span>
              <?php endif; ?>
              <?php if ($caption !== ''): ?>
              <span class="feed-item__caption" aria-hidden="true"><?php echo e($caption); ?></span>
              <?php endif; ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php if ($n > 1): ?>
          <span class="feed-item__counter font-mono" aria-live="polite">1 / <?php echo $n; ?></span>
          <div class="feed-item__dots" aria-hidden="true"></div>
          <button type="button" class="feed-item__nav feed-item__nav--prev" aria-label="Vorheriges Bild">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true" focusable="false"><polyline points="15 18 9 12 15 6"/></svg>
          </button>
          <button type="button" class="feed-item__nav feed-item__nav--next" aria-label="Nächstes Bild">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true" focusable="false"><polyline points="9 18 15 12 9 6"/></svg>
          </button>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ===================================================================
       WARUM TOS — die Kernbotschaft
       =================================================================== -->
  <section id="warum" class="section section--deep" aria-labelledby="warum-heading">
    <div class="container">
      <div class="nutzen-intro">
        <p class="eyebrow" data-reveal="left">Wofür wir stehen</p>
        <h2 id="warum-heading" data-reveal="up">Gute Beratung, <span class="hl u-nowrap">optimale Lösung</span> für Sie.</h2>
        <!-- ENTWURF (Kunde): Text noch nicht final — gelbe Markierung entfernen, sobald freigegeben -->
        <p class="nutzen-intro__lead" data-reveal="up-soft" data-reveal-delay="1">
          <mark class="draft">Die Zufriedenheit unserer Kunden steht an erster Stelle. Für die Umsetzung beraten wir Sie.</mark>
        </p>
      </div>
      <div class="nutzen-grid">
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="1">
          <span class="nutzen-item__number font-mono" aria-hidden="true">01</span>
          <h3 class="nutzen-item__title">Alles aus einer Hand</h3>
          <p class="nutzen-item__text">Ein Ansprechpartner für alle Gewerke. Wir koordinieren den Ablauf, nicht Sie.</p>
        </article>
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="2">
          <span class="nutzen-item__number font-mono" aria-hidden="true">02</span>
          <h3 class="nutzen-item__title">Fachkenntnis</h3>
          <p class="nutzen-item__text">Meisterbetrieb seit Jahrzehnten in Flensburg. Geprüfte Verfahren, saubere Ausführung.</p>
        </article>
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="3">
          <span class="nutzen-item__number font-mono" aria-hidden="true">03</span>
          <h3 class="nutzen-item__title">Ehrliche Beratung</h3>
          <p class="nutzen-item__text">Wir sagen Ihnen, was Ihr Gebäude wirklich braucht. Auch wenn es weniger ist als gedacht.</p>
        </article>
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="4">
          <span class="nutzen-item__number font-mono" aria-hidden="true">04</span>
          <h3 class="nutzen-item__title">Technisch &amp; wirtschaftlich</h3>
          <p class="nutzen-item__text">Die Lösung muss funktionieren und sich für Sie rechnen. Beides gehört zusammen.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Begriffsklärung -->
  <section class="section" aria-labelledby="begriffe-heading">
    <div class="container">
      <p class="eyebrow" data-reveal="left">Begriffsklärung</p>
      <h2 id="begriffe-heading" data-reveal="up">Renovierung, Sanierung, Modernisierung: Was meint was?</h2>
      <p class="section__subline" data-reveal="up" data-reveal-delay="1">In der Praxis werden die Begriffe oft synonym benutzt. Damit Sie wissen, was Sie wirklich brauchen:</p>
      <div class="compare-grid">
        <div class="compare-item" data-reveal="expand-x" data-reveal-delay="1">
          <p class="compare-item__label">Renovierung</p>
          <p class="compare-item__text">Auffrischen, was funktioniert. Tapete, Anstrich, Bodenbelag. Die Bausubstanz bleibt unangetastet.</p>
        </div>
        <div class="compare-item" data-reveal="expand-x" data-reveal-delay="2">
          <p class="compare-item__label">Sanierung</p>
          <p class="compare-item__text">Reparieren, was nicht mehr funktioniert. Feuchte Wände, undichte Dächer, Schimmel. Wir beheben die Ursache.</p>
        </div>
        <div class="compare-item" data-reveal="expand-x" data-reveal-delay="3">
          <p class="compare-item__label">Modernisierung</p>
          <p class="compare-item__text">Auf den heutigen Stand bringen. Wärmepumpe statt Ölkessel, Dämmung, neue Fenster. Das senkt Kosten und erhöht den Wert.</p>
        </div>
      </div>
      <p class="compare-note" data-reveal="up" data-reveal-delay="4">Wir machen alle drei. Und sagen Ihnen ehrlich, was bei Ihrem Projekt sinnvoll ist.</p>
    </div>
  </section>

  <!-- ===================================================================
       KONTAKT — Daten + Formular (Handler: kontakt-submit.php)
       =================================================================== -->
  <section id="kontakt" class="section kontakt" aria-labelledby="kontakt-heading">
    <div class="container">
      <div class="kontakt-grid">
        <div class="kontakt-daten" data-reveal="left">
          <p class="eyebrow">Kontakt</p>
          <h2 id="kontakt-heading">Sprechen Sie direkt mit <span class="hl">Tilman Handler</span></h2>
          <p class="section__subline kontakt-daten__subline">
            Wir melden uns schnellstmöglich zurück.
          </p>
          <address class="kontakt-daten__address">
            <strong><?php echo e(SITE_NAME); ?></strong><br>
            <?php echo e(CONTACT_STREET); ?>, <?php echo e(CONTACT_ZIP . ' ' . CONTACT_CITY); ?>
            · <a href="https://www.openstreetmap.org/?mlat=54.7836&mlon=9.4321#map=16/54.7836/9.4321"
                 target="_blank" rel="noopener noreferrer" class="kontakt-daten__map">Karte</a>
          </address>
          <dl class="kontakt-daten__list font-mono">
            <div>
              <dt>Telefon Büro</dt>
              <dd><a href="tel:<?php echo CONTACT_PHONE_TEL; ?>"><?php echo e(CONTACT_PHONE); ?></a></dd>
            </div>
            <div>
              <dt>Mobil</dt>
              <dd><a href="tel:+4915114431526"><?php echo e(CONTACT_MOBILE); ?></a></dd>
            </div>
            <div>
              <dt>Fax</dt>
              <dd><?php echo e(CONTACT_FAX); ?></dd>
            </div>
            <div>
              <dt>E-Mail</dt>
              <dd><a href="mailto:<?php echo e(CONTACT_EMAIL); ?>"><?php echo e(CONTACT_EMAIL); ?></a></dd>
            </div>
          </dl>
        </div>

        <div class="kontakt-formular" data-reveal="right" data-reveal-delay="1">
          <?php if ($gesendet): ?>
          <div class="form-success" role="alert">
            <p><strong>Ihre Anfrage ist eingegangen.</strong> Wir melden uns schnellstmöglich.</p>
          </div>
          <?php elseif ($fehler): ?>
          <div class="form-error" role="alert">
            <p>Beim Versenden ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut oder rufen Sie uns direkt an.</p>
          </div>
          <?php endif; ?>

          <form class="form" method="post" action="<?php echo e(site_path('/kontakt-submit.php')); ?>" novalidate>
            <div class="form__row">
              <div class="form__group">
                <label class="form__label" for="name">Name <abbr title="Pflichtfeld">*</abbr></label>
                <input class="form__input" type="text" id="name" name="name" required autocomplete="name">
              </div>
              <div class="form__group">
                <label class="form__label" for="email">E-Mail <abbr title="Pflichtfeld">*</abbr></label>
                <input class="form__input" type="email" id="email" name="email" required autocomplete="email">
              </div>
            </div>
            <div class="form__row">
              <div class="form__group">
                <label class="form__label" for="telefon">Telefonnummer</label>
                <input class="form__input" type="tel" id="telefon" name="telefon" autocomplete="tel">
              </div>
              <div class="form__group">
                <label class="form__label" for="quelle">Wie haben Sie uns gefunden?</label>
                <select class="form__select" id="quelle" name="quelle">
                  <option value="">-- Bitte wählen --</option>
                  <option value="Internetsuche">Internetsuche</option>
                  <option value="Google-Bewertungen">Google-Bewertungen</option>
                  <option value="Empfehlungen">Empfehlungen</option>
                  <option value="Medienbericht">Medienbericht</option>
                </select>
              </div>
            </div>
            <div class="form__group">
              <label class="form__label" for="anfrage">Ihre Anfrage <abbr title="Pflichtfeld">*</abbr></label>
              <textarea class="form__textarea" id="anfrage" name="anfrage" required minlength="10" rows="4"></textarea>
            </div>
            <div class="form__honeypot" aria-hidden="true">
              <label for="website">Website (bitte leer lassen)</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>
            <div class="form__group form__group--checkbox">
              <label class="form__checkbox-label">
                <input type="checkbox" name="datenschutz" required>
                <span>Ich habe die <a href="<?php echo e(site_path('/datenschutz')); ?>">Datenschutzerklärung</a> zur Kenntnis genommen. <abbr title="Pflichtfeld">*</abbr></span>
              </label>
            </div>
            <div class="form__submit">
              <button type="submit" class="btn btn--primary">Anfrage absenden</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Leistungs-Popups (Inhalte: data/leistungen.php) -->
  <?php foreach ($leistungen as $lid => $l):
      $titleId = 'dialog-' . $lid . '-title';
      $heading = $l['claim'] !== '' ? $l['claim'] : $l['title']; ?>
  <dialog id="dialog-<?php echo e($lid); ?>" class="leistung-dialog" aria-labelledby="<?php echo e($titleId); ?>">
    <div class="leistung-dialog__inner" tabindex="-1">
      <button type="button" class="leistung-dialog__close" aria-label="Schließen" data-dialog-close>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true" focusable="false"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <?php if ($l['claim'] !== ''): ?>
      <p class="eyebrow"><?php echo e($l['title']); ?></p>
      <?php endif; ?>
      <h2 id="<?php echo e($titleId); ?>" class="leistung-dialog__claim"><?php echo e($heading); ?></h2>
      <?php if (($l['text'] ?? '') !== ''): ?>
      <p class="leistung-dialog__lead"><?php echo e($l['text']); ?></p>
      <?php endif; ?>
      <ul class="leistung-dialog__list" role="list">
        <?php foreach ($l['items'] as $item):
            [$label, $details] = is_array($item) ? $item : [$item, '']; ?>
        <li>
          <span class="leistung-dialog__item"><?php echo e($label); ?></span>
          <?php if (is_array($details) && $details): ?>
          <ul class="leistung-dialog__sublist" role="list">
            <?php foreach ($details as $sub): ?>
            <li><?php echo e($sub); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php elseif (is_string($details) && $details !== ''): ?>
          <span class="leistung-dialog__details"><?php echo e($details); ?></span>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php if (!empty($l['marken'])): ?>
      <div class="kuechenmarken" aria-label="Marken">
        <?php foreach ($l['marken'] as [$file, $alt, $url]): ?>
        <a href="<?php echo e($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo e($alt); ?>: Herstellerwebsite öffnen">
          <img src="<?php echo e(asset_path('img/marken/' . $file)); ?>" alt="<?php echo e($alt); ?>" width="160" height="64" loading="lazy">
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </dialog>
  <?php endforeach; ?>

  <!-- Volltext einer Bewertung (wird per JS aus der Karte befüllt) -->
  <dialog id="review-dialog" class="review-dialog" aria-labelledby="review-dialog-author">
    <div class="review-dialog__inner" tabindex="-1">
      <button type="button" class="review-dialog__close" aria-label="Schließen" data-dialog-close>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" aria-hidden="true" focusable="false"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <div class="review-card__head">
        <span class="review-card__author" id="review-dialog-author"></span>
        <span class="review-dialog__stars"></span>
      </div>
      <p class="review-card__meta font-mono review-dialog__meta"></p>
      <p class="review-dialog__text"></p>
      <ul class="chips review-dialog__chips" role="list" aria-label="Leistungen in dieser Bewertung"></ul>
    </div>
  </dialog>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
