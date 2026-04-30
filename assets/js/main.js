/**
 * main.js — Mobile Navigation, Formular-Validierung
 * Kein Framework, kein Build-Tool, Vanilla JS.
 */

'use strict';

(function () {
  /* -------------------------------------------------------------------------
   * Mobile Navigation
   * -------------------------------------------------------------------- */
  const burger   = document.querySelector('.nav-burger');
  const mobileNav = document.getElementById('mobile-nav');
  const closeBtn = mobileNav ? mobileNav.querySelector('.mobile-nav__close') : null;

  function openNav() {
    if (!mobileNav || !burger) return;
    mobileNav.classList.add('is-open');
    mobileNav.removeAttribute('aria-hidden');
    burger.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    if (closeBtn) closeBtn.focus();
  }

  function closeNav() {
    if (!mobileNav || !burger) return;
    mobileNav.classList.remove('is-open');
    mobileNav.setAttribute('aria-hidden', 'true');
    burger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
    burger.focus();
  }

  if (burger) {
    burger.addEventListener('click', openNav);
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', closeNav);
  }

  // ESC-Taste schließt die Navigation
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('is-open')) {
      closeNav();
    }
  });

  // Klick auf Nav-Links schließt die Navigation
  if (mobileNav) {
    mobileNav.querySelectorAll('.mobile-nav__link').forEach(function (link) {
      link.addEventListener('click', closeNav);
    });
  }

  /* -------------------------------------------------------------------------
   * Kontaktformular — Client-side Validierung
   * -------------------------------------------------------------------- */
  const form = document.querySelector('.form');

  if (form) {
    form.addEventListener('submit', function (e) {
      let valid = true;
      const errors = [];

      const nameField = form.querySelector('[name="name"]');
      const emailField = form.querySelector('[name="email"]');
      const anfrageField = form.querySelector('[name="anfrage"]');
      const datenschutzField = form.querySelector('[name="datenschutz"]');

      // Fehler-Meldungen zurücksetzen
      form.querySelectorAll('.form__error-msg').forEach(function (el) { el.remove(); });
      form.querySelectorAll('.form__input--error').forEach(function (el) { el.classList.remove('form__input--error'); });

      if (nameField && !nameField.value.trim()) {
        valid = false;
        markError(nameField, 'Bitte geben Sie Ihren Namen an.');
      }

      if (emailField && !isValidEmail(emailField.value)) {
        valid = false;
        markError(emailField, 'Bitte geben Sie eine gültige E-Mail-Adresse an.');
      }

      if (anfrageField && anfrageField.value.trim().length < 10) {
        valid = false;
        markError(anfrageField, 'Ihre Anfrage muss mindestens 10 Zeichen enthalten.');
      }

      if (datenschutzField && !datenschutzField.checked) {
        valid = false;
        const label = datenschutzField.closest('label') || datenschutzField.parentElement;
        insertError(label, 'Bitte bestätigen Sie die Datenschutzerklärung.');
      }

      if (!valid) {
        e.preventDefault();
        const firstError = form.querySelector('.form__error-msg');
        if (firstError) firstError.focus();
      }
    });
  }

  function markError(field, message) {
    field.classList.add('form__input--error');
    field.setAttribute('aria-invalid', 'true');
    insertError(field, message);
  }

  function insertError(field, message) {
    const msg = document.createElement('p');
    msg.className = 'form__error-msg';
    msg.setAttribute('role', 'alert');
    msg.textContent = message;
    msg.tabIndex = -1;
    field.insertAdjacentElement('afterend', msg);
  }

  function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value.trim());
  }

  /* -------------------------------------------------------------------------
   * Reveal-Animationen — IntersectionObserver
   * Variants und Stagger werden im HTML per data-reveal/data-reveal-delay
   * gesetzt; CSS macht den Rest. Hier: ein einziger Observer für alle.
   * Plus: Safety-Net, falls Observer nicht feuert (alte Safari, Content-
   * Blocker, JS-Fehler woanders) — nach 2s alle Elemente erzwungen
   * sichtbar, damit nie etwas dauerhaft versteckt bleibt.
   * -------------------------------------------------------------------- */
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const reveals = document.querySelectorAll('[data-reveal]');

  function showAll() {
    reveals.forEach(function (el) { el.classList.add('is-visible'); });
  }

  if (reveals.length > 0) {
    if (reduceMotion || !('IntersectionObserver' in window)) {
      showAll();
    } else {
      try {
        const io = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              io.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.12,
          rootMargin: '0px 0px -40px 0px'
        });
        reveals.forEach(function (el) { io.observe(el); });
      } catch (e) {
        showAll();
      }
      // Fallback: falls Observer aus irgendeinem Grund nichts macht
      window.setTimeout(showAll, 2000);
    }
  }

  /* -------------------------------------------------------------------------
   * Google Analytics Opt-Out (Datenschutz-Seite)
   * -------------------------------------------------------------------- */
  const gaOptOutBtn = document.getElementById('ga-optout');
  if (gaOptOutBtn) {
    gaOptOutBtn.addEventListener('click', function () {
      try {
        const consent = JSON.parse(localStorage.getItem('tos_consent') || '{}');
        consent.analytics = false;
        consent.ts = Date.now();
        localStorage.setItem('tos_consent', JSON.stringify(consent));
        alert('Google Analytics wurde für diese Seite deaktiviert.');
      } catch (err) {
        // localStorage nicht verfügbar
      }
    });
  }

})();
