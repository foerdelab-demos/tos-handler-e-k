<?php
/**
 * footer.php — Kontaktblock, Quick-Links, Rechtliches, Copyright
 */

declare(strict_types=1);
require_once __DIR__ . '/config.php';
?>
<?php require_once __DIR__ . '/cookie-banner.php'; ?>

<footer class="site-footer" role="contentinfo">
  <div class="site-footer__inner container">

    <div class="site-footer__grid">

      <!-- Spalte 1: Kontakt -->
      <div class="site-footer__col">
        <h2 class="site-footer__heading">Kontakt</h2>
        <address class="site-footer__address">
          <strong><?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?></strong><br>
          <?php echo htmlspecialchars(CONTACT_STREET, ENT_QUOTES, 'UTF-8'); ?><br>
          <?php echo htmlspecialchars(CONTACT_ZIP . ' ' . CONTACT_CITY, ENT_QUOTES, 'UTF-8'); ?>
        </address>
        <dl class="site-footer__contact-list font-mono">
          <div>
            <dt>Büro</dt>
            <dd><a href="tel:<?php echo CONTACT_PHONE_TEL; ?>"><?php echo htmlspecialchars(CONTACT_PHONE, ENT_QUOTES, 'UTF-8'); ?></a></dd>
          </div>
          <div>
            <dt>Fax</dt>
            <dd><?php echo htmlspecialchars(CONTACT_FAX, ENT_QUOTES, 'UTF-8'); ?></dd>
          </div>
          <div>
            <dt>Mobil</dt>
            <dd><a href="tel:+4915114431526"><?php echo htmlspecialchars(CONTACT_MOBILE, ENT_QUOTES, 'UTF-8'); ?></a></dd>
          </div>
          <div>
            <dt>E-Mail</dt>
            <dd><a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL, ENT_QUOTES, 'UTF-8'); ?></a></dd>
          </div>
        </dl>
      </div>

      <!-- Spalte 2: Leistungen (Quick-Links) -->
      <div class="site-footer__col">
        <h2 class="site-footer__heading">Leistungen</h2>
        <ul class="site-footer__links" role="list">
          <li><a href="/leistungen">Badsanierung</a></li>
          <li><a href="/leistungen">Heizung &amp; Sanitär</a></li>
          <li><a href="/leistungen">Dachdecker- &amp; Klempnerarbeiten</a></li>
          <li><a href="/leistungen">Fassadensanierung</a></li>
          <li><a href="/leistungen">Innenausbau</a></li>
          <li><a href="/leistungen">Mauerwerksabdichtung</a></li>
        </ul>
      </div>

      <!-- Spalte 3: Rechtliches -->
      <div class="site-footer__col">
        <h2 class="site-footer__heading">Rechtliches</h2>
        <ul class="site-footer__links" role="list">
          <li><a href="/impressum">Impressum</a></li>
          <li><a href="/datenschutz">Datenschutz</a></li>
          <li><a href="/kontakt">Kontakt</a></li>
        </ul>
        <a href="https://www.google.com/maps/place/TOS+Handler+e.K./"
           class="site-footer__maps-link"
           target="_blank"
           rel="noopener noreferrer">
          Google Business
        </a>
      </div>

    </div><!-- /.site-footer__grid -->

  </div><!-- /.site-footer__inner -->

  <div class="site-footer__bottom">
    <div class="container">
      <p class="font-mono">
        &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?>
        &mdash; Reg-Nr. <?php echo htmlspecialchars(REG_NR, ENT_QUOTES, 'UTF-8'); ?>
        &mdash; USt.-ID-Nr. <?php echo htmlspecialchars(UST_ID, ENT_QUOTES, 'UTF-8'); ?>
      </p>
    </div>
  </div>

</footer>

<script src="/assets/js/main.js" defer></script>
