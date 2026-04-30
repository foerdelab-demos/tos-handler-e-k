<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Referenzen & Beispielfotos | TOS Handler Flensburg';
$page_description = 'Referenzfotos von TOS Handler e.K.: Badsanierungen, Fassadenarbeiten, Dacharbeiten, Kücheneinbau und Innenausbau in Flensburg und Umgebung.';
$page_canonical   = '/referenzen';
$body_class       = 'page-referenzen';

require_once __DIR__ . '/includes/header.php';

$projekte = require __DIR__ . '/data/projekte.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow" data-reveal="left">Referenzen</p>
      <h1 data-reveal="up">Referenzen — Beispielfotos unserer Arbeiten</h1>
    </div>
  </div>

  <!-- Filter-Leiste -->
  <div class="galerie-filter" role="group" aria-label="Galerie filtern">
    <div class="container">
      <button class="galerie-filter__btn is-active" data-filter="alle" aria-pressed="true">Alle</button>
      <button class="galerie-filter__btn" data-filter="bad"        aria-pressed="false">Bad</button>
      <button class="galerie-filter__btn" data-filter="kueche"     aria-pressed="false">Küche</button>
      <button class="galerie-filter__btn" data-filter="dach"       aria-pressed="false">Dach</button>
      <button class="galerie-filter__btn" data-filter="fassade"    aria-pressed="false">Fassade</button>
      <button class="galerie-filter__btn" data-filter="innenausbau" aria-pressed="false">Innenausbau</button>
      <button class="galerie-filter__btn" data-filter="spezial"    aria-pressed="false">Spezial</button>
    </div>
  </div>

  <!-- Galerie-Grid -->
  <section class="section galerie-section" aria-label="Bildgalerie">
    <div class="container">
      <div class="galerie-grid" id="galerie-grid">
        <?php foreach ($projekte as $idx => $projekt): ?>
        <div class="galerie-item" data-cat="<?php echo htmlspecialchars($projekt['cat'], ENT_QUOTES, 'UTF-8'); ?>">
          <button class="galerie-item__btn"
                  data-index="<?php echo $idx; ?>"
                  aria-label="<?php echo htmlspecialchars($projekt['title'], ENT_QUOTES, 'UTF-8'); ?> — Großansicht öffnen">
            <img src="<?php echo htmlspecialchars(IMG_PROJEKTE . $projekt['file'], ENT_QUOTES, 'UTF-8'); ?>"
                 alt="<?php echo htmlspecialchars($projekt['title'], ENT_QUOTES, 'UTF-8'); ?>"
                 width="600" height="450"
                 loading="lazy" decoding="async">
            <span class="galerie-item__title"><?php echo htmlspecialchars($projekt['title'], ENT_QUOTES, 'UTF-8'); ?></span>
          </button>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Lightbox (wird per JS befüllt) -->
  <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Bildansicht" hidden>
    <div class="lightbox__backdrop"></div>
    <div class="lightbox__inner">
      <button class="lightbox__close" aria-label="Bildansicht schließen">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true" focusable="false">
          <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>
      <button class="lightbox__prev" aria-label="Vorheriges Bild">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true" focusable="false">
          <polyline points="15 18 9 12 15 6"/>
        </svg>
      </button>
      <figure class="lightbox__figure">
        <img id="lightbox-img" src="" alt="" class="lightbox__img">
        <figcaption id="lightbox-caption" class="lightbox__caption font-mono"></figcaption>
      </figure>
      <button class="lightbox__next" aria-label="Nächstes Bild">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true" focusable="false">
          <polyline points="9 18 15 12 9 6"/>
        </svg>
      </button>
    </div>
  </div>

  <div class="section__action container" data-reveal="scale">
    <a href="<?php echo htmlspecialchars(site_path('/kontakt'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--primary">Auch Ihr Projekt anfragen</a>
  </div>

</main>

<script>
// Galerie-Daten fuer lightbox.js
window.GALERIE = <?php echo json_encode(array_values($projekte), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;
window.IMG_BASE = '<?php echo IMG_PROJEKTE; ?>';
</script>
<script src="<?php echo htmlspecialchars(asset_path('js/lightbox.js'), ENT_QUOTES, 'UTF-8'); ?>" defer></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
