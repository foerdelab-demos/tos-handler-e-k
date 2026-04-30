/**
 * consent.js — TTDSG-konformer Cookie-Consent
 * Speichert in localStorage: { necessary: true, analytics: bool, ts: timestamp }
 * Google Analytics wird nur nach explizitem Opt-In injiziert.
 */

'use strict';

(function () {
  var STORAGE_KEY = 'tos_consent';
  var GA_ID = 'G-XXXXXXXXXX'; // Google Analytics Measurement ID — hier eintragen

  /* -------------------------------------------------------------------------
   * Consent lesen / schreiben
   * -------------------------------------------------------------------- */

  function getConsent() {
    try {
      var raw = localStorage.getItem(STORAGE_KEY);
      return raw ? JSON.parse(raw) : null;
    } catch (e) {
      return null;
    }
  }

  function saveConsent(analytics) {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify({
        necessary: true,
        analytics: analytics,
        ts: Date.now()
      }));
    } catch (e) {
      // localStorage nicht verfügbar
    }
  }

  /* -------------------------------------------------------------------------
   * Google Analytics laden (nur nach Einwilligung)
   * -------------------------------------------------------------------- */

  function loadGA() {
    if (document.getElementById('ga-script')) return; // bereits geladen
    var s = document.createElement('script');
    s.id = 'ga-script';
    s.src = 'https://www.googletagmanager.com/gtag/js?id=' + GA_ID;
    s.async = true;
    document.head.appendChild(s);
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    window.gtag = gtag;
    gtag('js', new Date());
    gtag('config', GA_ID, { anonymize_ip: true });
  }

  /* -------------------------------------------------------------------------
   * Banner anzeigen / ausblenden
   * -------------------------------------------------------------------- */

  var banner = document.getElementById('cookie-banner');

  function showBanner() {
    if (!banner) return;
    banner.removeAttribute('hidden');
  }

  function hideBanner() {
    if (!banner) return;
    banner.setAttribute('hidden', '');
  }

  /* -------------------------------------------------------------------------
   * Initialisierung
   * -------------------------------------------------------------------- */

  var existing = getConsent();

  if (existing) {
    // Bereits entschieden — GA ggf. laden
    if (existing.analytics) {
      loadGA();
    }
  } else {
    // Noch keine Entscheidung — Banner zeigen
    showBanner();
  }

  /* -------------------------------------------------------------------------
   * Event-Listener
   * -------------------------------------------------------------------- */

  var acceptAllBtn = document.getElementById('cookie-accept-all');
  var acceptNecessaryBtn = document.getElementById('cookie-accept-necessary');
  var settingsBtn = document.getElementById('cookie-settings');
  var saveSettingsBtn = document.getElementById('cookie-save-settings');
  var analyticsToggle = document.getElementById('cookie-analytics-toggle');
  var settingsPanel = document.getElementById('cookie-settings-panel');

  if (acceptAllBtn) {
    acceptAllBtn.addEventListener('click', function () {
      saveConsent(true);
      loadGA();
      hideBanner();
    });
  }

  if (acceptNecessaryBtn) {
    acceptNecessaryBtn.addEventListener('click', function () {
      saveConsent(false);
      hideBanner();
    });
  }

  if (settingsBtn && settingsPanel) {
    settingsBtn.addEventListener('click', function () {
      var hidden = settingsPanel.hasAttribute('hidden');
      if (hidden) {
        settingsPanel.removeAttribute('hidden');
        settingsBtn.textContent = 'Einstellungen schließen';
      } else {
        settingsPanel.setAttribute('hidden', '');
        settingsBtn.textContent = 'Einstellungen';
      }
    });
  }

  if (saveSettingsBtn && analyticsToggle) {
    saveSettingsBtn.addEventListener('click', function () {
      var analyticsEnabled = analyticsToggle.checked;
      saveConsent(analyticsEnabled);
      if (analyticsEnabled) {
        loadGA();
      }
      hideBanner();
    });
  }

})();
