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
    ['href' => '#leistungen',  'label' => 'Leistungen',  'spy' => 'gebaeudesanierung gebaeudetechnik renovierung'],
    ['href' => '#bewertungen', 'label' => 'Bewertungen', 'spy' => 'bewertungen'],
    ['href' => '#warum',       'label' => 'Warum TOS',   'spy' => 'warum einblicke'],
    ['href' => '#kontakt',     'label' => 'Kontakt',     'spy' => 'kontakt'],
];

function nav_href(string $home, string $href): string
{
    return $href[0] === '#' ? $home . $href : site_path($href);
}
?>
<header class="site-header" role="banner">
  <div class="site-header__inner container">

    <a href="<?php echo htmlspecialchars($home, ENT_QUOTES, 'UTF-8'); ?>" class="site-header__logo" aria-label="<?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?> — Startseite">
      <img src="<?php echo htmlspecialchars(asset_path('img/2TOS-Brief-Typo.png'), ENT_QUOTES, 'UTF-8'); ?>"
           alt="TOS Handler e.K. — Meisterfachbetrieb Flensburg"
           width="160" height="60"
           loading="eager">
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
      <a href="tel:<?php echo CONTACT_PHONE_TEL; ?>" class="site-header__tel" aria-label="Büro anrufen: <?php echo CONTACT_PHONE; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter" aria-hidden="true" focusable="false">
          <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.18 2 2 0 012 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"/>
        </svg>
        <span class="site-header__tel-number"><?php echo htmlspecialchars(CONTACT_PHONE, ENT_QUOTES, 'UTF-8'); ?></span>
      </a>
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
      <ul class="mobile-nav__list" role="list">
        <?php foreach ($nav_items as $item): ?>
        <li>
          <a href="<?php echo htmlspecialchars(nav_href($home, $item['href']), ENT_QUOTES, 'UTF-8'); ?>" class="mobile-nav__link">
            <?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </li>
        <?php endforeach; ?>
        <li>
          <a href="<?php echo htmlspecialchars($home . '#kontakt', ENT_QUOTES, 'UTF-8'); ?>" class="mobile-nav__link mobile-nav__link--cta">Anfrage stellen</a>
        </li>
      </ul>
      <address class="mobile-nav__contact">
        <a href="tel:<?php echo CONTACT_PHONE_TEL; ?>" class="font-mono"><?php echo htmlspecialchars(CONTACT_PHONE, ENT_QUOTES, 'UTF-8'); ?></a><br>
        <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo htmlspecialchars(CONTACT_EMAIL, ENT_QUOTES, 'UTF-8'); ?></a>
      </address>
    </nav>
  </div>
</div>
