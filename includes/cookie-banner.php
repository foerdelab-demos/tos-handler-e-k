<?php
/**
 * cookie-banner.php — TTDSG-konformer Consent-Banner
 * Wird am Anfang von footer.php eingebunden (vor dem <footer>-Tag).
 * Logik liegt in assets/js/consent.js
 */
?>
<div id="cookie-banner" class="cookie-banner" aria-live="polite" aria-atomic="true" hidden>
  <div class="cookie-banner__inner">
    <div class="cookie-banner__text">
      <p>
        Diese Seite verwendet Cookies. Notwendige Cookies sind immer aktiv.
        Mit Ihrer Zustimmung aktivieren wir Google Analytics zur Verbesserung des Angebots.
        Weitere Informationen finden Sie in unserer
        <a href="/datenschutz">Datenschutzerklärung</a>.
      </p>
    </div>
    <div class="cookie-banner__actions">
      <button class="btn btn--primary" id="cookie-accept-all">Alle akzeptieren</button>
      <button class="btn btn--ghost" id="cookie-accept-necessary">Nur notwendige</button>
      <button class="btn btn--ghost" id="cookie-settings">Einstellungen</button>
    </div>
  </div>

  <!-- Erweiterte Einstellungen (initial versteckt) -->
  <div id="cookie-settings-panel" class="cookie-settings" hidden>
    <div class="cookie-settings__inner">
      <h2 class="cookie-settings__heading">Cookie-Einstellungen</h2>
      <ul class="cookie-settings__list" role="list">
        <li class="cookie-settings__item">
          <label class="cookie-settings__label">
            <input type="checkbox" checked disabled aria-describedby="cookie-necessary-desc">
            <span>Notwendige Cookies</span>
          </label>
          <p id="cookie-necessary-desc" class="cookie-settings__desc">
            Immer aktiv. Erforderlich für den Betrieb der Seite.
          </p>
        </li>
        <li class="cookie-settings__item">
          <label class="cookie-settings__label">
            <input type="checkbox" id="cookie-analytics-toggle" aria-describedby="cookie-analytics-desc">
            <span>Statistik (Google Analytics)</span>
          </label>
          <p id="cookie-analytics-desc" class="cookie-settings__desc">
            Hilft uns zu verstehen, wie Besucher die Seite nutzen. Nur nach expliziter Zustimmung aktiv.
          </p>
        </li>
      </ul>
      <div class="cookie-settings__actions">
        <button class="btn btn--primary" id="cookie-save-settings">Auswahl speichern</button>
      </div>
    </div>
  </div>
</div>

<script src="/assets/js/consent.js" defer></script>
