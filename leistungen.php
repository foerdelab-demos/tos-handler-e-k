<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Leistungen | Badsanierung, Heizung, Sanitär, Dach | TOS Handler Flensburg';
$page_description = 'Alle Leistungen von TOS Handler e.K. Flensburg: Badsanierung, Heizung, Sanitär, Lüftung, Dachdecker- und Klempnerarbeiten, Fassadensanierung, Innenausbau.';
$page_canonical   = '/leistungen';
$body_class       = 'page-leistungen';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow">Leistungen</p>
      <h1>Unsere Leistungen</h1>
    </div>
  </div>

  <section class="section section--narrow" aria-label="Einleitung">
    <div class="container container--narrow">
      <div class="prose">
        <p class="lead"><strong>Gebäudetechnik — vom Rohbau bis zum komfortablen Wohnraum.</strong></p>
        <p>Ihre wertvolle Bausubstanz wird erhalten.</p>
      </div>
    </div>
  </section>

  <section class="section" aria-labelledby="gewerke-heading">
    <div class="container">
      <h2 id="gewerke-heading">Sechs Hauptgewerke</h2>
      <div class="gewerke-grid">

        <article class="gewerk-card">
          <h3 class="gewerk-card__title">Renovierungen und Sanierungen</h3>
        </article>

        <article class="gewerk-card">
          <h3 class="gewerk-card__title">Montagen</h3>
        </article>

        <article class="gewerk-card">
          <h3 class="gewerk-card__title">Regeltechnik</h3>
        </article>

        <article class="gewerk-card">
          <h3 class="gewerk-card__title">Heizung / Lüftung</h3>
        </article>

        <article class="gewerk-card">
          <h3 class="gewerk-card__title">Sanitär</h3>
        </article>

        <article class="gewerk-card">
          <h3 class="gewerk-card__title">Dachdecker- und Klempnerarbeiten</h3>
        </article>

      </div>
    </div>
  </section>

  <section class="section section--deep" aria-labelledby="angebot-heading">
    <div class="container container--narrow">
      <p class="eyebrow">Im Detail</p>
      <h2 id="angebot-heading">Wir bieten Ihnen</h2>
      <ul class="leistungs-liste prose">
        <li>Badsanierung aus einer Hand zum Festpreis</li>
        <li>Innenausbau, vom Rohbau bis zum komfortablen Wohnraum</li>
        <li>Sanierungsvorschläge erstellen / umsetzen</li>
        <li>Heizungs-, Lüftungs- und Sanitärarbeiten</li>
        <li>Mauerwerksabdichtung (Negativ- / Passivabdichtung) in verschiedenen Verfahren</li>
        <li>Fassaden-, Dach- und Klempnerarbeiten</li>
        <li>Balkon- und Kellersanierung</li>
        <li>Fugensanierung, Verputz und Maurerarbeiten</li>
        <li>Schimmelpilzbeseitigung und Schimmelprävention mit notwendigen Messungen und Untersuchungen</li>
        <li>Sonderanfertigungen</li>
        <li>Sanierung bei Brand- und Wasserschäden</li>
      </ul>
    </div>
  </section>

  <section class="section" aria-label="Partner">
    <div class="container container--narrow">
      <p class="prose">
        Wir liefern und montieren Fenster, Türen und Rollladensysteme von <strong>Drutex</strong>.
      </p>
    </div>
  </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
