<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Partner | TOS Handler Flensburg';
$page_description = 'Bewährte Zusammenarbeit mit lokalen Spezialisten — Partner von TOS Handler e.K. Flensburg: Bauputz, Elektro, Fenster und Türen von Drutex.';
$page_canonical   = '/partner';
$body_class       = 'page-partner';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow" data-reveal="left">Partner</p>
      <h1 data-reveal="up">Unsere Partner</h1>
      <p class="page-header__subline" data-reveal="up" data-reveal-delay="1">Bewährte Zusammenarbeit mit lokalen Spezialisten.</p>
    </div>
  </div>

  <section class="section" aria-label="Partner-Liste">
    <div class="container">
      <div class="partner-grid">

        <article class="partner-card" data-reveal="up" data-reveal-delay="1">
          <h2 class="partner-card__name">MC – Bauputz, Flensburg</h2>
          <p class="partner-card__branch">Putz- und Stuckateurarbeiten</p>
        </article>

        <article class="partner-card" data-reveal="up" data-reveal-delay="2">
          <h2 class="partner-card__name">Elektro- und Haustechnik Staron</h2>
          <p class="partner-card__branch">Elektroinstallation</p>
        </article>

        <article class="partner-card" data-reveal="up" data-reveal-delay="3">
          <h2 class="partner-card__name">Drutex</h2>
          <p class="partner-card__branch">Fenster, Türen, Rollladensysteme (Lieferant)</p>
        </article>

      </div>
    </div>
  </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
