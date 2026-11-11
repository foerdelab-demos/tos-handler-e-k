<?php
/**
 * footer.php — nur Rechtliches (Impressum, Datenschutz) + Copyright-Zeile
 */

declare(strict_types=1);
require_once __DIR__ . '/config.php';
?>
<?php require_once __DIR__ . '/cookie-banner.php'; ?>

<footer class="site-footer" role="contentinfo">
  <div class="site-footer__inner container">
    <nav class="site-footer__legal" aria-label="Rechtliches">
      <a href="<?php echo htmlspecialchars(site_path('/impressum'), ENT_QUOTES, 'UTF-8'); ?>">Impressum</a>
      <a href="<?php echo htmlspecialchars(site_path('/datenschutz'), ENT_QUOTES, 'UTF-8'); ?>">Datenschutz</a>
    </nav>
    <p class="site-footer__copy font-mono">
      &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?>
      &middot; Reg-Nr. <?php echo htmlspecialchars(REG_NR, ENT_QUOTES, 'UTF-8'); ?>
      &middot; USt.-ID-Nr. <?php echo htmlspecialchars(UST_ID, ENT_QUOTES, 'UTF-8'); ?>
      &middot; Webdesign: <a href="https://jasonholweg.de" target="_blank" rel="noopener" class="site-footer__credit">Jason Holweg</a>
    </p>
  </div>
</footer>

<script src="<?php echo htmlspecialchars(asset_path('js/main.js'), ENT_QUOTES, 'UTF-8'); ?>" defer></script>
