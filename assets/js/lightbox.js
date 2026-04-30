/**
 * lightbox.js — Galerie-Lightbox
 * Abhängigkeiten: window.GALERIE (Array aus referenzen.php), window.IMG_BASE
 * Tastatur: ESC = schliessen, Pfeiltasten = vor/zurück
 */

'use strict';

(function () {
  if (!window.GALERIE || !window.IMG_BASE) return;

  var galerie   = window.GALERIE;
  var imgBase   = window.IMG_BASE;
  var lightbox  = document.getElementById('lightbox');
  var lbImg     = document.getElementById('lightbox-img');
  var lbCaption = document.getElementById('lightbox-caption');
  var lbPrev    = lightbox ? lightbox.querySelector('.lightbox__prev') : null;
  var lbNext    = lightbox ? lightbox.querySelector('.lightbox__next') : null;
  var lbClose   = lightbox ? lightbox.querySelector('.lightbox__close') : null;
  var lbBackdrop = lightbox ? lightbox.querySelector('.lightbox__backdrop') : null;

  var currentIndex = 0;
  var visibleItems = []; // gefilterte Indizes

  if (!lightbox || !lbImg) return;

  /* -------------------------------------------------------------------------
   * Galerie-Elemente registrieren
   * -------------------------------------------------------------------- */

  var galerieGrid = document.getElementById('galerie-grid');
  if (!galerieGrid) return;

  var buttons = galerieGrid.querySelectorAll('.galerie-item__btn');

  buttons.forEach(function (btn, idx) {
    btn.addEventListener('click', function () {
      currentIndex = idx;
      updateVisibleItems();
      openLightbox(idx);
    });
  });

  /* -------------------------------------------------------------------------
   * Filter
   * -------------------------------------------------------------------- */

  var filterBtns = document.querySelectorAll('.galerie-filter__btn');
  var currentFilter = 'alle';

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      currentFilter = btn.dataset.filter;
      filterBtns.forEach(function (b) {
        b.classList.remove('is-active');
        b.setAttribute('aria-pressed', 'false');
      });
      btn.classList.add('is-active');
      btn.setAttribute('aria-pressed', 'true');
      applyFilter();
    });
  });

  function applyFilter() {
    var items = galerieGrid.querySelectorAll('.galerie-item');
    items.forEach(function (item) {
      if (currentFilter === 'alle' || item.dataset.cat === currentFilter) {
        item.removeAttribute('hidden');
      } else {
        item.setAttribute('hidden', '');
      }
    });
    updateVisibleItems();
  }

  function updateVisibleItems() {
    var items = galerieGrid.querySelectorAll('.galerie-item:not([hidden])');
    visibleItems = Array.from(items).map(function (item) {
      return parseInt(item.querySelector('.galerie-item__btn').dataset.index, 10);
    });
  }

  updateVisibleItems();

  /* -------------------------------------------------------------------------
   * Lightbox öffnen / schliessen
   * -------------------------------------------------------------------- */

  function openLightbox(idx) {
    var projekt = galerie[idx];
    if (!projekt) return;

    lbImg.src = imgBase + projekt.file;
    lbImg.alt = projekt.title;
    lbCaption.textContent = projekt.title;
    lightbox.removeAttribute('hidden');
    document.body.style.overflow = 'hidden';
    lbClose.focus();
  }

  function closeLightbox() {
    lightbox.setAttribute('hidden', '');
    document.body.style.overflow = '';
    // Fokus zurück auf den zuletzt geöffneten Button
    var openedBtn = galerieGrid.querySelector('[data-index="' + currentIndex + '"]');
    if (openedBtn) openedBtn.focus();
  }

  function showPrev() {
    var pos = visibleItems.indexOf(currentIndex);
    if (pos <= 0) {
      currentIndex = visibleItems[visibleItems.length - 1];
    } else {
      currentIndex = visibleItems[pos - 1];
    }
    openLightbox(currentIndex);
  }

  function showNext() {
    var pos = visibleItems.indexOf(currentIndex);
    if (pos < 0 || pos >= visibleItems.length - 1) {
      currentIndex = visibleItems[0];
    } else {
      currentIndex = visibleItems[pos + 1];
    }
    openLightbox(currentIndex);
  }

  /* -------------------------------------------------------------------------
   * Event-Listener
   * -------------------------------------------------------------------- */

  if (lbClose) lbClose.addEventListener('click', closeLightbox);
  if (lbBackdrop) lbBackdrop.addEventListener('click', closeLightbox);
  if (lbPrev) lbPrev.addEventListener('click', showPrev);
  if (lbNext) lbNext.addEventListener('click', showNext);

  document.addEventListener('keydown', function (e) {
    if (lightbox.hasAttribute('hidden')) return;
    if (e.key === 'Escape')      { closeLightbox(); }
    if (e.key === 'ArrowLeft')   { showPrev(); }
    if (e.key === 'ArrowRight')  { showNext(); }
  });

})();
