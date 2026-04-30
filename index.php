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
      <picture class="hero__picture">
        <source media="(max-width: 767px)"
                srcset="<?php echo htmlspecialchars(asset_path('img/projekte/Fassade_4.jpg'), ENT_QUOTES, 'UTF-8'); ?>">
        <img src="<?php echo htmlspecialchars(asset_path('img/projekte/Zaun.jpg'), ENT_QUOTES, 'UTF-8'); ?>"
             alt="Sanierungsobjekt — Referenz von TOS Handler e.K. Flensburg"
             width="1600" height="900"
             loading="eager" decoding="sync"
             class="hero__image">
      </picture>
      <div class="hero__overlay" aria-hidden="true"></div>
    </div>
    <div class="hero__content container">
      <h1 class="hero__headline" data-reveal="up">Ein Ansprechpartner für Ihr gesamtes Objekt – von Heizung bis Dach</h1>
      <p class="hero__subline" data-reveal="up" data-reveal-delay="1">TOS Handler plant, koordiniert und realisiert Sanierung, Modernisierung und technische Objektleistungen in Flensburg – zuverlässig, fachgerecht und aus einer Hand.</p>
      <div class="hero__actions" data-reveal="up" data-reveal-delay="2">
        <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--secondary">Projekt unverbindlich besprechen</a>
        <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--ghost-light">Referenzen ansehen</a>
      </div>
      <ul class="hero__trust" aria-label="Drei Gründe für TOS Handler" data-reveal="up" data-reveal-delay="3">
        <li class="hero__trust-item">Meisterbetrieb aus Flensburg</li>
        <li class="hero__trust-item">Alles aus einer Hand</li>
        <li class="hero__trust-item">Auch bei Brand- &amp; Wasserschäden</li>
      </ul>
    </div>
  </section>

  <!-- Nutzen-Abschnitt: Was uns vom üblichen Handwerker-Ansatz unterscheidet -->
  <section class="section section--narrow" aria-labelledby="nutzen-heading">
    <div class="container">
      <div class="nutzen-intro">
        <p class="eyebrow" data-reveal="left">Was wir tun</p>
        <h2 id="nutzen-heading" data-reveal="up">Technischer Objekt-Service ohne Koordinationsaufwand</h2>
        <p class="nutzen-intro__lead" data-reveal="up-soft" data-reveal-delay="1">
          Ob Bad, Heizung, Dach, Fassade oder Schadensanierung: Wir bündeln mehrere Gewerke, übernehmen die Abstimmung und liefern saubere Lösungen für Ihr Objekt. Sie haben einen festen Ansprechpartner und ein Team, das Planung und Ausführung zusammen denkt.
        </p>
      </div>

      <div class="nutzen-grid">
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="1">
          <span class="nutzen-item__number font-mono" aria-hidden="true">01</span>
          <h3 class="nutzen-item__title">Ein Ansprechpartner</h3>
          <p class="nutzen-item__text">Keine Abstimmung mit mehreren Gewerken — wir koordinieren den Ablauf.</p>
        </article>
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="2">
          <span class="nutzen-item__number font-mono" aria-hidden="true">02</span>
          <h3 class="nutzen-item__title">Planung &amp; Ausführung</h3>
          <p class="nutzen-item__text">Von technischer Lösung bis Bauantrag und statischer Berechnung.</p>
        </article>
        <article class="nutzen-item" data-reveal="up" data-reveal-delay="3">
          <span class="nutzen-item__number font-mono" aria-hidden="true">03</span>
          <h3 class="nutzen-item__title">Saubere Umsetzung</h3>
          <p class="nutzen-item__text">Fachgerechte Arbeit, klare Kommunikation und verlässlicher Service.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- Leistungen-Grid -->
  <section class="section section--deep" aria-labelledby="leistungen-heading">
    <div class="container">
      <p class="eyebrow" data-reveal="left">01 / Leistungen</p>
      <h2 id="leistungen-heading" data-reveal="up">Wobei können wir Ihnen helfen?</h2>
      <div class="leistungen-grid">

        <article class="leistung-card" data-reveal="up" data-reveal-delay="1">
          <h3 class="leistung-card__title">Badsanierung</h3>
          <p class="leistung-card__text">Komplettbad aus einer Hand — sauber geplant, fachgerecht umgesetzt.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="2">
          <h3 class="leistung-card__title">Heizung &amp; Sanitär</h3>
          <p class="leistung-card__text">Moderne Technik für Wärme, Wasser und effizienten Betrieb.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="3">
          <h3 class="leistung-card__title">Dach &amp; Klempner</h3>
          <p class="leistung-card__text">Dacharbeiten, Gauben und Klempnerlösungen für Ihr Objekt.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="4">
          <h3 class="leistung-card__title">Fassadensanierung</h3>
          <p class="leistung-card__text">Schutz und Aufwertung der Gebäudehülle.</p>
          <a href="<?php echo htmlspecialchars(site_path('/gewerke'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="5">
          <h3 class="leistung-card__title">Innenausbau</h3>
          <p class="leistung-card__text">Vom Rohbau bis zum fertigen Wohn- oder Nutzraum.</p>
          <a href="<?php echo htmlspecialchars(site_path('/leistungen'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Mehr erfahren</a>
        </article>

        <article class="leistung-card" data-reveal="up" data-reveal-delay="6">
          <h3 class="leistung-card__title">Brand- &amp; Wasserschaden</h3>
          <p class="leistung-card__text">Schnelle Hilfe und koordinierte Sanierung nach Schäden.</p>
          <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="leistung-card__link">Anfrage stellen</a>
        </article>

      </div>
    </div>
  </section>

  <!-- Referenzen-Teaser -->
  <section class="section" aria-labelledby="referenzen-teaser-heading">
    <div class="container">
      <p class="eyebrow" data-reveal="left">02 / Referenzen</p>
      <h2 id="referenzen-teaser-heading" data-reveal="up">Ergebnisse, die man sehen kann</h2>
      <p class="section__subline" data-reveal="up-soft" data-reveal-delay="1">Ein Einblick in abgeschlossene Arbeiten — von technischer Modernisierung bis Komplettsanierung.</p>
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
      <div class="section__action section__action--prominent" data-reveal="scale">
        <a href="<?php echo htmlspecialchars(site_path('/referenzen'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--primary">Alle Referenzen ansehen</a>
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
  <section class="section cta-banner" aria-labelledby="cta-banner-heading">
    <div class="container">
      <div class="cta-banner__lede">
        <h2 id="cta-banner-heading" class="cta-banner__heading" data-reveal="up">Sie haben ein Objekt oder Projekt in Flensburg?</h2>
        <p class="cta-banner__text" data-reveal="up" data-reveal-delay="1">
          Sprechen Sie direkt mit Tilman Handler. Wir klären, was technisch sinnvoll ist, welche Gewerke benötigt werden und wie Ihr Projekt sauber umgesetzt werden kann.
        </p>
      </div>
      <div class="cta-banner__actions" data-reveal="scale" data-reveal-delay="2">
        <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--primary-light">Jetzt Projekt anfragen</a>
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