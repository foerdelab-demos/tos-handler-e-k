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

  // ESC-Taste schließt Navigation bzw. jeden offenen Dialog
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    if (mobileNav && mobileNav.classList.contains('is-open')) closeNav();
    document.querySelectorAll('dialog[open]').forEach(function (d) { d.close(); });
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
   * Scrollspy — markiert den Nav-Link der gerade sichtbaren Sektion
   * (Onepager). data-spy="id1 id2 ..." am Link listet zugehörige Sektionen.
   * -------------------------------------------------------------------- */
  const spyLinks = document.querySelectorAll('.site-nav__link[data-spy]');
  if (spyLinks.length > 0 && 'IntersectionObserver' in window) {
    const sectionToLink = new Map();
    spyLinks.forEach(function (link) {
      link.dataset.spy.split(/\s+/).forEach(function (id) {
        const section = document.getElementById(id);
        if (section) sectionToLink.set(section, link);
      });
    });
    if (sectionToLink.size > 0) {
      const spy = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          spyLinks.forEach(function (l) {
            l.classList.remove('is-active');
            l.removeAttribute('aria-current');
          });
          const active = sectionToLink.get(entry.target);
          active.classList.add('is-active');
          active.setAttribute('aria-current', 'true');
        });
      }, { rootMargin: '-35% 0px -55% 0px' });
      sectionToLink.forEach(function (_link, section) { spy.observe(section); });
    }
  }

  /* -------------------------------------------------------------------------
   * Bewertungs-Carousel — natives Scroll-Snap; hier Pfeile, Punkte, Zustand.
   * Punkte und Pfeile arbeiten SEITENWEISE (so viele Karten, wie gerade
   * nebeneinander passen: Desktop 3, Tablet 2, Handy 1). Wischen/Scrollen
   * funktioniert auch ohne dieses Skript.
   * -------------------------------------------------------------------- */
  document.querySelectorAll('[data-carousel]').forEach(function (root) {
    const track    = root.querySelector('.carousel__track');
    const slides   = Array.prototype.slice.call(root.querySelectorAll('.carousel__slide'));
    const prevBtn  = root.querySelector('.carousel__btn--prev');
    const nextBtn  = root.querySelector('.carousel__btn--next');
    const dotsWrap = root.querySelector('.carousel__dots');
    if (!track || slides.length === 0 || !prevBtn || !nextBtn || !dotsWrap) return;

    const behavior = reduceMotion ? 'auto' : 'smooth';
    const PAD = 4; // Track-Padding (siehe CSS), Snap rastet bei offsetLeft − PAD ein
    let step = 0, perView = 1, pages = 1, current = 0, dots = [];

    function measure() {
      step = slides.length > 1 ? (slides[1].offsetLeft - slides[0].offsetLeft) : track.clientWidth;
      perView = Math.max(1, Math.round(track.clientWidth / step));
      const newPages = Math.max(1, Math.ceil(slides.length / perView));
      if (newPages !== pages || dots.length === 0) {
        pages = newPages;
        buildDots();
      }
      root.classList.toggle('is-single-page', pages <= 1);
    }

    function buildDots() {
      dotsWrap.innerHTML = '';
      dots = [];
      for (let i = 0; i < pages; i++) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'carousel__dot';
        dot.setAttribute('aria-label', 'Seite ' + (i + 1) + ' von ' + pages);
        dot.addEventListener('click', function () { goToPage(i); });
        dotsWrap.appendChild(dot);
        dots.push(dot);
      }
    }

    function goToPage(page) {
      page = Math.max(0, Math.min(pages - 1, page));
      const slideIndex = Math.min(slides.length - 1, page * perView);
      track.scrollTo({ left: slides[slideIndex].offsetLeft - PAD, behavior: behavior });
    }

    function update() {
      const maxScroll = track.scrollWidth - track.clientWidth;
      if (track.scrollLeft >= maxScroll - 8) {
        current = pages - 1;                       // Ende erreicht = letzte Seite
      } else {
        current = Math.round(track.scrollLeft / (step * perView));
        current = Math.max(0, Math.min(pages - 1, current));
      }
      dots.forEach(function (dot, i) {
        dot.classList.toggle('is-active', i === current);
        dot.setAttribute('aria-current', i === current ? 'true' : 'false');
      });
      prevBtn.disabled = track.scrollLeft <= 8;
      nextBtn.disabled = track.scrollLeft >= maxScroll - 8;
    }

    prevBtn.addEventListener('click', function () { goToPage(current - 1); });
    nextBtn.addEventListener('click', function () { goToPage(current + 1); });

    let pending = false;
    track.addEventListener('scroll', function () {
      if (pending) return;
      pending = true;
      window.requestAnimationFrame(function () { pending = false; update(); });
    });
    window.addEventListener('resize', function () { measure(); update(); });

    measure();
    update();
  });

  /* -------------------------------------------------------------------------
   * „Weiterlesen“ bei langen Rezensionen: 5 Zeilen Vorschau in der Karte,
   * Volltext im <dialog>. Ohne Dialog-Support (sehr alte Browser) wird
   * stattdessen in der Karte aufgeklappt.
   * -------------------------------------------------------------------- */
  const reviewDialog    = document.getElementById('review-dialog');
  const dialogSupported = !!(reviewDialog && typeof reviewDialog.showModal === 'function');

  function openReviewDialog(card) {
    const author = card.querySelector('.review-card__author');
    const stars  = card.querySelector('.stars');
    const meta   = card.querySelector('.review-card__meta');
    const text   = card.querySelector('.review-card__text');
    const chips  = card.querySelector('.chips');

    reviewDialog.querySelector('#review-dialog-author').textContent = author ? author.textContent : '';
    reviewDialog.querySelector('.review-dialog__stars').innerHTML   = stars ? stars.outerHTML : '';
    reviewDialog.querySelector('.review-dialog__meta').textContent  = meta ? meta.textContent : '';
    reviewDialog.querySelector('.review-dialog__text').innerHTML    = text ? text.innerHTML : '';
    const chipsSlot = reviewDialog.querySelector('.review-dialog__chips');
    chipsSlot.innerHTML = chips ? chips.innerHTML : '';
    chipsSlot.hidden = !chips;

    document.body.classList.add('has-dialog');
    reviewDialog.showModal();
    const inner = reviewDialog.querySelector('.review-dialog__inner');
    if (inner) inner.focus({ preventScroll: true });
    reviewDialog.scrollTop = 0;
  }

  if (dialogSupported) {
    reviewDialog.addEventListener('close', function () {
      document.body.classList.remove('has-dialog');
    });
    // Klick auf den Backdrop schließt
    reviewDialog.addEventListener('click', function (e) {
      if (e.target === reviewDialog) reviewDialog.close();
    });
    reviewDialog.querySelectorAll('[data-dialog-close]').forEach(function (b) {
      b.addEventListener('click', function () { reviewDialog.close(); });
    });
  }

  document.querySelectorAll('.review-card__text[data-clamp]').forEach(function (text) {
    text.classList.add('is-clamped');
    if (text.scrollHeight <= text.clientHeight + 2) {
      text.classList.remove('is-clamped');
      return;
    }
    const card = text.closest('.review-card');
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'review-card__more';
    btn.textContent = 'Weiterlesen';

    if (dialogSupported && card) {
      btn.setAttribute('aria-haspopup', 'dialog');
      btn.addEventListener('click', function () { openReviewDialog(card); });
    } else {
      btn.setAttribute('aria-expanded', 'false');
      btn.addEventListener('click', function () {
        const expanded = !text.classList.toggle('is-clamped');
        btn.textContent = expanded ? 'Weniger anzeigen' : 'Weiterlesen';
        btn.setAttribute('aria-expanded', String(expanded));
      });
    }
    text.insertAdjacentElement('afterend', btn);
  });

  /* -------------------------------------------------------------------------
   * Header-Logo auf der Startseite: ausgeblendet, solange das große Logo im
   * Hero sichtbar ist; eingeblendet, sobald es unter den Header gescrollt
   * ist. Block entfernen → Header-Logo ist immer sichtbar.
   * -------------------------------------------------------------------- */
  const heroLogo   = document.querySelector('.hero__logo');
  const siteHeader = document.querySelector('.site-header');
  if (heroLogo && siteHeader && 'IntersectionObserver' in window) {
    siteHeader.classList.add('site-header--hero-logo');
    window.requestAnimationFrame(function () {
      window.requestAnimationFrame(function () { siteHeader.classList.add('is-ready'); });
    });
    const headerH = siteHeader.offsetHeight || 72;
    new IntersectionObserver(function (entries) {
      siteHeader.classList.toggle('is-past-hero-logo', !entries[0].isIntersecting);
    }, { rootMargin: '-' + headerH + 'px 0px 0px 0px' }).observe(heroLogo);
  }

  /* -------------------------------------------------------------------------
   * Leistungs-Popups: <a href="#dialog-…" data-open-dialog> öffnet das
   * gleichnamige <dialog>. Schließen per ✕, Escape oder Klick daneben.
   * -------------------------------------------------------------------- */
  document.querySelectorAll('dialog.leistung-dialog').forEach(function (dlg) {
    if (typeof dlg.showModal !== 'function') return;
    dlg.addEventListener('close', function () { document.body.classList.remove('has-dialog'); });
    dlg.addEventListener('click', function (e) { if (e.target === dlg) dlg.close(); });
    dlg.querySelectorAll('[data-dialog-close]').forEach(function (b) {
      b.addEventListener('click', function () { dlg.close(); });
    });
  });

  document.querySelectorAll('[data-open-dialog]').forEach(function (trigger) {
    trigger.addEventListener('click', function (e) {
      const id  = (trigger.getAttribute('href') || '').replace(/^#/, '');
      const dlg = id ? document.getElementById(id) : null;
      if (!dlg || typeof dlg.showModal !== 'function') return;
      e.preventDefault();
      document.body.classList.add('has-dialog');
      dlg.showModal();
      const inner = dlg.querySelector('.leistung-dialog__inner');
      if (inner) inner.focus({ preventScroll: true });
      dlg.scrollTop = 0;
    });
  });

  /* -------------------------------------------------------------------------
   * Projekte-Feed: Bildstreifen pro Projekt (Scroll-Snap), Zähler, Punkte,
   * Pfeile. Wischen funktioniert auch ohne dieses Skript.
   * -------------------------------------------------------------------- */
  document.querySelectorAll('[data-strip]').forEach(function (media) {
    const strip   = media.querySelector('.feed-item__strip');
    const pics    = strip ? strip.children : [];
    const n       = pics.length;
    const counter = media.querySelector('.feed-item__counter');
    const dotsBox = media.querySelector('.feed-item__dots');
    const prev    = media.querySelector('.feed-item__nav--prev');
    const next    = media.querySelector('.feed-item__nav--next');

    // Querformat-Bilder: komplett zeigen, Rest mit weichgezeichneter Kopie füllen
    Array.prototype.forEach.call(pics, function (pic) {
      const img = pic.querySelector('img');
      if (!img) return;
      function markLandscape() {
        if (!img.naturalWidth || img.naturalWidth < img.naturalHeight) return;
        pic.classList.add('feed-item__pic--landscape');
        if (!pic.querySelector('.feed-item__bg')) {
          const bg = img.cloneNode(false);
          bg.className = 'feed-item__bg';
          bg.alt = '';
          bg.setAttribute('aria-hidden', 'true');
          bg.removeAttribute('loading');
          pic.insertBefore(bg, img);
        }
      }
      if (img.complete && img.naturalWidth) markLandscape();
      else img.addEventListener('load', markLandscape, { once: true });
    });

    if (!strip || n < 2) return;

    const dots = [];
    if (dotsBox) {
      for (let i = 0; i < n; i++) {
        const d = document.createElement('span');
        dotsBox.appendChild(d);
        dots.push(d);
      }
    }

    let current = 0;
    function update() {
      const w = strip.clientWidth || 1;
      current = Math.max(0, Math.min(n - 1, Math.round(strip.scrollLeft / w)));
      if (counter) counter.textContent = (current + 1) + ' / ' + n;
      dots.forEach(function (d, i) { d.classList.toggle('is-active', i === current); });
      if (prev) prev.disabled = current === 0;
      if (next) next.disabled = current === n - 1;
    }
    function goTo(i) {
      i = Math.max(0, Math.min(n - 1, i));
      strip.scrollTo({ left: i * strip.clientWidth, behavior: reduceMotion ? 'auto' : 'smooth' });
    }
    if (prev) prev.addEventListener('click', function () { goTo(current - 1); });
    if (next) next.addEventListener('click', function () { goTo(current + 1); });

    let pending = false;
    strip.addEventListener('scroll', function () {
      if (pending) return;
      pending = true;
      window.requestAnimationFrame(function () { pending = false; update(); });
    });
    window.addEventListener('resize', update);
    update();
  });

  /* -------------------------------------------------------------------------
   * Projekte-Feed auf dem Handy: Seite so ausrichten, dass der Feed exakt
   * unter dem Header beginnt (sobald man ihm nahe kommt), dann den Feed
   * selbst scrollbar schalten. Verlässt man ihn (Anfang/Ende), übernimmt
   * wieder die Seite.
   * -------------------------------------------------------------------- */
  const feed       = document.querySelector('.feed');
  const mobileFeed = window.matchMedia('(max-width: 767px)');
  if (feed) {
    let lastY = window.scrollY, dirDown = true, timer = null, aligning = false;

    function headerH() {
      const h = document.querySelector('.site-header');
      return h ? h.offsetHeight : 72;
    }
    function offset() { return feed.getBoundingClientRect().top - headerH(); }
    function setActive() {
      feed.classList.toggle('is-active', mobileFeed.matches && Math.abs(offset()) <= 3);
    }
    function settle() {
      if (!mobileFeed.matches) { feed.classList.remove('is-active'); return; }
      const o = offset(), fh = feed.offsetHeight, vh = window.innerHeight;
      const approachingFromAbove = dirDown && o > 3 && o < vh * 0.6;
      const returningFromBelow   = !dirDown && o < -3 && o > -fh * 0.5;
      if (approachingFromAbove || returningFromBelow) {
        aligning = true;
        window.scrollBy({ top: o, behavior: reduceMotion ? 'auto' : 'smooth' });
        // nach dem weichen Scrollen aktiv schalten; bei langsamem Scroll kurz nachprüfen
        let tries = 0;
        (function check() {
          tries++;
          if (Math.abs(offset()) <= 3 || tries >= 4) { aligning = false; setActive(); }
          else window.setTimeout(check, 250);
        })();
        window.setTimeout(function () { if (aligning) { aligning = false; setActive(); } }, 1200);
      } else {
        setActive();
      }
    }
    window.addEventListener('scroll', function () {
      const y = window.scrollY;
      if (y !== lastY) { dirDown = y > lastY; lastY = y; }
      if (aligning) return;
      window.clearTimeout(timer);
      timer = window.setTimeout(settle, 120);
    }, { passive: true });
    window.addEventListener('resize', setActive);
    setActive();
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
