<?php
/**
 * nav.php — Hauptnavigation (Onepager: Anker auf Sektionen der Startseite)
 * Wird von header.php eingebunden.
 */

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$home = site_path('/');

// href beginnt mit '#' → Anker auf der Startseite; 'spy' = Sektions-IDs für den Scrollspy (main.js)
$nav_items = [
    ['href' => '#leistungen',  'label' => 'Leistungen',  'spy' => 'leistungen'],
    ['href' => '#bewertungen', 'label' => 'Bewertungen', 'spy' => 'bewertungen'],
    ['href' => '#warum',       'label' => 'Warum TOS',   'spy' => 'warum'],
    ['href' => '#kontakt',     'label' => 'Kontakt',     'spy' => 'kontakt'],
];

function nav_href(string $home, string $href): string
{
    return $href[0] === '#' ? $home . $href : site_path($href);
}
?>
<header class="site-header" role="banner">
  <div class="site-header__inner container">

    <a href="<?php echo htmlspecialchars($home, ENT_QUOTES, 'UTF-8'); ?>" class="site-header__logo" aria-label="<?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?>, zur Startseite">
      <span class="brand__text"><span class="brand__initial">T</span>echnischer <span class="brand__initial">O</span>bjekt-<span class="brand__initial">S</span>ervice</span>
      <span class="brand__house" aria-hidden="true"></span>
    </a>

    <nav class="site-nav" aria-label="Hauptnavigation">
      <ul class="site-nav__list" role="list">
        <?php foreach ($nav_items as $item): ?>
        <li class="site-nav__item">
          <a href="<?php echo htmlspecialchars(nav_href($home, $item['href']), ENT_QUOTES, 'UTF-8'); ?>"
             class="site-nav__link"
             data-spy="<?php echo htmlspecialchars($item['spy'], ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="site-header__actions">
      <a href="<?php echo htmlspecialchars($home . '#kontakt', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn--ghost">Anfrage stellen</a>
    </div>

    <button class="nav-burger" aria-expanded="false" aria-controls="mobile-nav" aria-label="Navigation öffnen">
      <span class="nav-burger__bar"></span>
      <span class="nav-burger__bar"></span>
      <span class="nav-burger__bar"></span>
    </button>

  </div>
</header>

<!-- Mobile-Navigation: vollflächige Overlay-Page -->
<div id="mobile-nav" class="mobile-nav" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Mobile Navigation">
  <div class="mobile-nav__inner">
    <button class="mobile-nav__close" aria-label="Navigation schließen">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true" focusable="false">
        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
      </svg>
    </button>
    <nav aria-label="Mobile Navigation">
      <!-- Handy-Menü bewusst reduziert (Kundenwunsch): Kontakt, zwei Standorte, Impressum.
           Die Desktop-Navigation ($nav_items) bleibt davon unberührt. -->
      <ul class="mobile-nav__list" role="list">
        <li>
          <a href="<?php echo htmlspecialchars($home . '#kontakt', ENT_QUOTES, 'UTF-8'); ?>" class="mobile-nav__link">Kontakt</a>
        </li>
        <li class="mobile-nav__place">
          <span class="mobile-nav__place-label">Lager &amp; Werkstatt</span>
          <span class="mobile-nav__place-address">Munketoft 1</span>
        </li>
        <li class="mobile-nav__place">
          <span class="mobile-nav__place-label">Büro</span>
          <span class="mobile-nav__place-address">Waitzstraße 10</span>
        </li>
        <li>
          <a href="<?php echo htmlspecialchars(site_path('/impressum'), ENT_QUOTES, 'UTF-8'); ?>" class="mobile-nav__link">Impressum</a>
        </li>
      </ul>
      <address class="mobile-nav__contact">
        <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo htmlspecialchars(CONTACT_EMAIL, ENT_QUOTES, 'UTF-8'); ?></a>
      </address>
    </nav>
  </div>
</div>
