<?php
declare(strict_types=1);
http_response_code(404);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Seite nicht gefunden | TOS Handler Flensburg';
$page_description = 'Die gesuchte Seite wurde nicht gefunden.';
$page_canonical   = '';
$body_class       = 'page-404';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow font-mono">404</p>
      <h1>Seite nicht gefunden</h1>
      <p class="page-header__subline">Diese Seite gibt es leider nicht.</p>
    </div>
  </div>

  <section class="section section--narrow" aria-label="Hilfe">
    <div class="container container--narrow">
      <p>Möglicherweise wurde die Adresse geändert oder die Seite wurde entfernt.</p>
      <div class="section__action">
        <a href="<?php echo htmlspecialchars(site_path('/'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--primary">Zur Startseite</a>
        <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--secondary">Kontakt aufnehmen</a>
      </div>
    </div>
  </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
