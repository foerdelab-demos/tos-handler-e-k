<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Heizung, Sanitär & Dachdecker Flensburg | TOS Handler — Meisterfachbetrieb';
$page_description = 'TOS Handler e.K. — Meisterfachbetrieb für Heizung, Sanitär, Lüftung & Dachdecker-Klempnerarbeiten in Flensburg. Badsanierung, Fassade, Innenausbau aus einer Hand.';
$page_canonical   = '/';
$body_class       = 'page-home';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <!-- Hero -->
  <section class="hero" aria-label="Einstieg">
    <div class="hero__image-wrap">
      <img src="<?php echo htmlspecialchars(asset_path('img/projekte/1000-volquardsen-img_4410-kl.jpg'), ENT_QUOTES, 'UTF-8'); ?>"
           alt="Modernes Bad — fertige Badsanierung durch TOS Handler e.K. Flensburg"
           width="1600" height="900"
           loading="eager" decoding="sync"
           class="hero__image">
      <div class="hero__overlay" aria-hidden="true"></div>
    </div>
    <div class="hero__content container">
      <h1 class="hero__headline" data-reveal="up">Meisterfachbetrieb für Heizung, Sanitär, Lüftung &amp; Dach — aus einer Hand</h1>
      <p class="hero__subline" data-reveal="up" data-reveal-delay="1">Ihr zuverlässiger Partner in Flensburg für Sanierung, Modernisierung und Innenausbau.</p>
      <div class="hero__actions" data-reveal="up" data-reveal-delay="2">
        <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--primary">Anfrage stellen</a>
        <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--ghost">Unsere Leistungen</a>
      </div>
    </div>
  </section>

  <!-- Begrüßung -->
  <section class="section section--narrow" aria-label="Begrüßung">
    <div class="container container--narrow">
      <div class="prose" data-reveal="up-soft">
        <p><strong>Lieber Besucher unserer Webseite,</strong></p>
        <p>
          unser Unternehmen in Flensburg ist ein <strong>Meisterfachbetrieb</strong> für Heizung, Sanitär, Lüftung und Dachdecker-Klempnerarbeiten.
        </p>
        <p>
          Unsere Firma bietet Ihnen rund um Ihr Objekt fundiertes Fachwissen und zuverlässigen Service komplett aus einer Hand an.
        </p>
        <p>
          Wir realisieren technische Lösungen und suchen nach Möglichkeiten, um für Sie das bestmöglichste Ergebnis abzuliefern.
        </p>
        <p>
          Auch bei einem Brand- oder Wasserschaden dürfen Sie uns kontaktieren.
        </p>
        <p>
          Zusätzlich übernehmen wir Architektenleistungen mit Bauantrag und den notwendigen statischen Berechnungen.
        </p>
        <p>
          Bei Fragen rufen Sie uns bitte an oder senden uns eine Nachricht.
        </p>
        <p><strong>Wir beraten Sie gerne.</strong></p>
      </div>
    </div>
  </section>

  <!-- Leistungen-Grid -->
  <section class="section section--deep" aria-labelledby="leistungen-heading">
    <div class="container">
      <p class="eyebrow" data-reveal="left">01 / Leistungen</p>
      <h2 id="leistungen-heading" data-reveal="up">Was wir bauen</h2>
      <div class="leistungen-grid">

        <article class="leistung-card" data-reveal="up" data-reveal-delay="1">
          <h3 class="leistung-card__title">Badsanierung</h3>
          <p class="leistung-card__text">Komplettbad zum Festpreis aus einer Hand.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="2">
          <h3 class="leistung-card__title">Heizung &amp; Sanitär</h3>
          <p class="leistung-card__text">Moderne Heiztechnik, Fernwärme, Regelungstechnik.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="3">
          <h3 class="leistung-card__title">Dach &amp; Klempner</h3>
          <p class="leistung-card__text">Gauben, Dacheindeckung, Klempnerarbeiten.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="4">
          <h3 class="leistung-card__title">Fassadensanierung</h3>
          <p class="leistung-card__text">Mikroporen-Beschichtung ohne Fungizide.</p>
          <a href="<?php echo htmlspecialchars(site_path('/gewerke'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="5">
          <h3 class="leistung-card__title">Innenausbau</h3>
          <p class="leistung-card__text">Vom Rohbau bis zum komfortablen Wohnraum.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="6">
          <h3 class="leistung-card__title">Brand- &amp; Wasserschaden</h3>
          <p class="leistung-card__text">Schnelle Sanierung bei Schadensfällen.</p>
          <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Anfrage stellen</a>
        </article>

      </div>
    </div>
  </section>

  <!-- Referenzen-Teaser -->
  <section class="section" aria-labelledby="referenzen-teaser-heading">
    <div class="container">
      <p class="eyebrow" data-reveal="left">02 / Referenzen</p>
      <h2 id="referenzen-teaser-heading" data-reveal="up">Beispielfotos unserer Arbeiten</h2>
      <div class="referenzen-teaser">

        <article class="ref-card">
          <a href="<?php echo htmlspecialchars(site_path('/referenz-fernwaerme'), ENT_QUOTES, 'UTF-8'); ?>" class="ref-card__image-link" data-reveal="reveal-image" data-reveal-delay="1">
            <img src="<?php echo htmlspecialchars(asset_path('img/projekte/1000-volquardsen-img_4425-kl.jpg'), ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Modernisierung Primär-Fernwärmestation"
                 width="600" height="400"
                 loading="lazy" decoding="async">
          </a>
          <div class="ref-card__body" data-reveal="up" data-reveal-delay="2">
            <h3 class="ref-card__title">Modernisierung Primär-Fernwärmestation</h3>
            <a href="<?php echo htmlspecialchars(site_path('/referenz-fernwaerme'), ENT_QUOTES, 'UTF-8'); ?>" class="ref-card__link">Projekt ansehen</a>
          </div>
        </article>

        <article class="ref-card">
          <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="ref-card__image-link" data-reveal="reveal-image" data-reveal-delay="2">
            <img src="<?php echo htmlspecialchars(asset_path('img/projekte/IMG_8620.jpg'), ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Komplettsanierung Bad — vorher"
                 width="600" height="400"
                 loading="lazy" decoding="async">
          </a>
          <div class="ref-card__body" data-reveal="up" data-reveal-delay="3">
            <h3 class="ref-card__title">Komplettsanierung Bad</h3>
            <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="ref-card__link">Alle Referenzen</a>
          </div>
        </article>

        <article class="ref-card">
          <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="ref-card__image-link" data-reveal="reveal-image" data-reveal-delay="3">
            <img src="<?php echo htmlspecialchars(asset_path('img/projekte/1fertig_fass1188.jpg'), ENT_QUOTES, 'UTF-8'); ?>"
                 alt="Fassadensanierung — Ergebnis"
                 width="600" height="400"
                 loading="lazy" decoding="async">
          </a>
          <div class="ref-card__body" data-reveal="up" data-reveal-delay="4">
            <h3 class="ref-card__title">Fassadensanierung</h3>
            <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="ref-card__link">Alle Referenzen</a>
          </div>
        </article>

      </div>
      <div class="section__action" data-reveal="up">
        <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--secondary">Alle Referenzen ansehen</a>
      </div>
    </div>
  </section>

  <!-- Trust-Block -->
  <section class="section section--deep" aria-labelledby="trust-heading">
    <div class="container">
      <p class="eyebrow" data-reveal="left">03 / Wofür wir stehen</p>
      <h2 id="trust-heading" class="sr-only">Unsere Stärken</h2>
      <div class="trust-block">
        <div class="trust-item" data-reveal="scale" data-reveal-delay="1">
          <p class="trust-item__label font-mono">Meisterbetrieb</p>
          <p class="trust-item__text">Seit Jahrzehnten in Flensburg. Geprüfte Qualität, persönliche Verantwortung.</p>
        </div>
        <div class="trust-item" data-reveal="scale" data-reveal-delay="2">
          <p class="trust-item__label font-mono">Aus einer Hand</p>
          <p class="trust-item__text">Heizung, Sanitär, Dach, Fassade, Innenausbau — kein Koordinationsaufwand für Sie.</p>
        </div>
        <div class="trust-item" data-reveal="scale" data-reveal-delay="3">
          <p class="trust-item__label font-mono">Eigenes Equipment</p>
          <p class="trust-item__text">Fassadengerüste, Inspektionskamera, Kernbohrmaschinen, Architektenleistungen mit Bauantrag.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Kontakt-CTA-Banner -->
  <section class="section cta-banner" aria-label="Direkt anfragen">
    <div class="container">
      <p class="cta-banner__text" data-reveal="up">Sie haben ein Projekt? Sprechen Sie direkt mit Tilman Handler.</p>
      <div class="cta-banner__actions" data-reveal="scale" data-reveal-delay="1">
        <a href="tel:<?php echo CONTACT_PHONE_TEL; ?>" class="btn btn--ghost-light">
          <?php echo htmlspecialchars(CONTACT_PHONE, ENT_QUOTES, 'UTF-8'); ?>
        </a>
        <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="btn btn--ghost-light">
          <?php echo htmlspecialchars(CONTACT_EMAIL, ENT_QUOTES, 'UTF-8'); ?>
        </a>
      </div>
    </div>
  </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>