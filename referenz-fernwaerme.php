<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Modernisierung Fernwärmestation — Referenz | TOS Handler';
$page_description = 'Fallstudie: Modernisierung einer Primär-Fernwärmestation durch TOS Handler e.K. Flensburg — erhebliche Betriebskosteneinsparung nach Umbau.';
$page_canonical   = '/referenz-fernwaerme';
$body_class       = 'page-referenz-detail';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow"><a href="/referenzen">Referenzen</a></p>
      <h1>Modernisierung einer Primär-Fernwärmestation</h1>
    </div>
  </div>

  <section class="section" aria-label="Fallbeschreibung Beispiel 1">
    <div class="container container--narrow">
      <div class="prose">
        <p>
          An einer alten Anlage wurden in den letzten Jahren unnötigerweise Pumpen, Mischer und Ventile getauscht.
        </p>
        <p>
          Als unser Unternehmen den Auftrag bekam, einen Ausfall der Warmwasserversorgung zu beheben, stellten wir fest, dass die Überbleibsel einer alten Ölheizung unnötig sind, da seit über 20 Jahren ein Fernwärmeanschluss für die Wärmeversorgung sorgt.
        </p>
        <p>
          Nach dem Umbau durch unser Unternehmen sparte der Kunde erhebliche Betriebskosten für Strom und Wärme ein.
        </p>
      </div>
    </div>
  </section>

  <!-- Vorher/Nachher -->
  <section class="section section--deep" aria-labelledby="vorher-nachher-heading">
    <!-- Hinweis: Die Original-Fotos der Fernwärmestation (1IMG_9145.png, 1IMG_9144.png)
         sind noch in assets/img/projekte/ einzupflegen. Bis dahin: Platzhalter-Bilder. -->
    <div class="container">
      <h2 id="vorher-nachher-heading" class="sr-only">Vorher und Nachher</h2>
      <div class="vorher-nachher">
        <figure class="vorher-nachher__item">
          <img src="/assets/img/projekte/IMG_8620.jpg"
               alt="Primär-Fernwärmestation — Zustand vorher"
               width="800" height="600"
               loading="lazy" decoding="async">
          <figcaption class="vorher-nachher__label font-mono">VORHER</figcaption>
        </figure>
        <figure class="vorher-nachher__item">
          <img src="/assets/img/projekte/IMG_8823.jpg"
               alt="Primär-Fernwärmestation — nach dem Umbau"
               width="800" height="600"
               loading="lazy" decoding="async">
          <figcaption class="vorher-nachher__label font-mono">NACHHER</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- Beispiel 2: Modernisierung -->
  <section class="section" aria-labelledby="modernisierung-heading">
    <div class="container container--narrow">
      <p class="eyebrow">Weiteres Beispiel</p>
      <h2 id="modernisierung-heading">Modernisierung</h2>
      <div class="vorher-nachher">
        <figure class="vorher-nachher__item">
          <img src="/assets/img/projekte/IMG_8620.jpg"
               alt="Heizungsanlage — Zustand vor der Modernisierung"
               width="800" height="600"
               loading="lazy" decoding="async">
          <figcaption class="vorher-nachher__label font-mono">VOR DER MODERNISIERUNG</figcaption>
        </figure>
        <figure class="vorher-nachher__item">
          <img src="/assets/img/projekte/IMG_8823.jpg"
               alt="Heizungsanlage — nach der Modernisierung"
               width="800" height="600"
               loading="lazy" decoding="async">
          <figcaption class="vorher-nachher__label font-mono">ABSCHLUSS DER MODERNISIERUNG</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <div class="section__action container">
    <a href="/referenzen" class="btn btn--secondary">Alle Referenzen</a>
    <a href="/kontakt" class="btn btn--primary">Anfrage stellen</a>
  </div>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
