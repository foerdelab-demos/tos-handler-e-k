<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Kontakt & Anfrage | TOS Handler Flensburg';
$page_description = 'Kontaktformular und Kontaktdaten von TOS Handler e.K. — Meisterfachbetrieb in Flensburg. Anfrage stellen, Rückruf bekommen.';
$page_canonical   = '/kontakt';
$body_class       = 'page-kontakt';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow" data-reveal="left">Kontakt</p>
      <h1 data-reveal="up">Wir freuen uns über eine Nachricht</h1>
      <p class="page-header__subline" data-reveal="up" data-reveal-delay="1">
        Füllen Sie dieses Formular aus, wenn Sie weitere Informationen benötigen. Wir treten schnellstmöglich mit Ihnen in Verbindung.
      </p>
    </div>
  </div>

  <section class="section" aria-label="Kontakt und Formular">
    <div class="container">
      <div class="kontakt-grid">

        <!-- Kontaktdaten -->
        <div class="kontakt-daten" data-reveal="left">
          <h2 class="kontakt-daten__heading">Tilman Handler</h2>
          <address class="kontakt-daten__address">
            <?php echo htmlspecialchars(CONTACT_STREET, ENT_QUOTES, 'UTF-8'); ?><br>
            <?php echo htmlspecialchars(CONTACT_ZIP . ' ' . CONTACT_CITY, ENT_QUOTES, 'UTF-8'); ?>
          </address>
          <dl class="kontakt-daten__list font-mono">
            <div>
              <dt>Telefon Büro</dt>
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

          <!-- OpenStreetMap Static Fallback -->
          <div class="kontakt-karte" aria-label="Karte: Munketoft 1, 24941 Flensburg">
            <a href="https://www.openstreetmap.org/?mlat=54.7836&mlon=9.4321#map=16/54.7836/9.4321"
               target="_blank"
               rel="noopener noreferrer"
               class="kontakt-karte__link">
              Standort auf OpenStreetMap ansehen
            </a>
          </div>
        </div>

        <!-- Kontaktformular -->
        <div class="kontakt-formular" data-reveal="right" data-reveal-delay="1">
          <?php if (isset($_GET['gesendet']) && $_GET['gesendet'] === '1'): ?>
          <div class="form-success" role="alert">
            <p><strong>Ihre Anfrage ist eingegangen.</strong> Wir melden uns schnellstmöglich.</p>
          </div>
          <?php elseif (isset($_GET['fehler'])): ?>
          <div class="form-error" role="alert">
            <p>Beim Versenden ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut oder rufen Sie uns direkt an.</p>
          </div>
          <?php endif; ?>

          <form class="form" method="post" action="<?php echo htmlspecialchars(site_path('/kontakt-submit.php'), ENT_QUOTES, 'UTF-8'); ?>" novalidate>

            <div class="form__group">
              <label class="form__label" for="name">Name <abbr title="Pflichtfeld">*</abbr></label>
              <input class="form__input" type="text" id="name" name="name"
                     required autocomplete="name"
                     value="<?php echo htmlspecialchars($_GET['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="form__group">
              <label class="form__label" for="email">E-Mail <abbr title="Pflichtfeld">*</abbr></label>
              <input class="form__input" type="email" id="email" name="email"
                     required autocomplete="email"
                     value="<?php echo htmlspecialchars($_GET['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="form__group">
              <label class="form__label" for="telefon">Telefonnummer</label>
              <input class="form__input" type="tel" id="telefon" name="telefon"
                     autocomplete="tel"
                     value="<?php echo htmlspecialchars($_GET['telefon'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="form__group">
              <label class="form__label" for="quelle">Wie sind Sie auf uns aufmerksam geworden?</label>
              <select class="form__select" id="quelle" name="quelle">
                <option value="">-- Bitte wählen --</option>
                <option value="Internetsuche">Internetsuche</option>
                <option value="Empfehlungen">Empfehlungen</option>
                <option value="Medienbericht">Medienbericht</option>
              </select>
            </div>

            <div class="form__group">
              <label class="form__label" for="anfrage">Ihre Anfrage <abbr title="Pflichtfeld">*</abbr></label>
              <textarea class="form__textarea" id="anfrage" name="anfrage"
                        required minlength="10" rows="6"><?php echo htmlspecialchars($_GET['anfrage'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>

            <!-- Honeypot (muss leer bleiben) -->
            <div class="form__honeypot" aria-hidden="true">
              <label for="website">Website (bitte leer lassen)</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="form__group form__group--checkbox">
              <label class="form__checkbox-label">
                <input type="checkbox" name="datenschutz" required>
                <span>Ich habe die <a href="<?php echo htmlspecialchars(site_path('/datenschutz'), ENT_QUOTES, 'UTF-8'); ?>">Datenschutzerklärung</a> zur Kenntnis genommen. <abbr title="Pflichtfeld">*</abbr></span>
              </label>
            </div>

            <div class="form__submit">
              <button type="submit" class="btn btn--primary">Anfrage absenden</button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
