# Build-Prompt: Neuauflage tos-handler.de

> Diese Datei ist die vollständige Spezifikation für das Modernisierungsprojekt. Lege sie als `BUILD_PROMPT.md` ins Repo-Root und referenziere sie in Copilot-Chats mit `@workspace BUILD_PROMPT.md`. Sie enthält alle Originalinhalte der Bestandsseite, damit nichts verloren geht.

---

## 1. Projektkontext

Die bestehende Webseite **tos-handler.de** ist eine ca. 10 Jahre alte Joomla-Installation mit veralteten URLs (`/index.php/2014-05-13-19-05-45`), nicht responsive, ohne Cookie-Consent (TTDSG-Risiko durch eingebundenes Google Analytics) und mit ungenutztem Bildmaterial. Inhaltlich ist der Betrieb stark — Meisterfachbetrieb für Heizung, Sanitär, Lüftung, Dachdecker- und Klempnerarbeiten in Flensburg mit Architektenleistungen, eigenem Fassadengerüst, Inspektionskamera und WTA-geprüfter Mauerwerkssanierung.

**Ziel:** Eine schlanke, responsive, schnell ladende Neuauflage, die alle bestehenden Inhalte erhält, das Bildmaterial moderner inszeniert, lokales SEO ausschöpft und rechtssicher ist.

---

## 2. Tech-Stack

- **Backend:** PHP 8.2+, kein Framework, simple Includes-Architektur
- **Datenbank:** keine — die Seite ist statisch genug für Flat-File / PHP-Includes (kein CMS-Overhead). Optional MySQL nur falls später ein Anfrage-Logging gebaut wird.
- **Frontend:** Vanilla JS (kein Framework), CSS Custom Properties, keine externen UI-Libraries
- **Build:** Kein Bundler erforderlich, optional kleines `build.php` für WebP-Konvertierung
- **Forms:** PHP-Mailer (PHPMailer via Composer) für das Kontaktformular, Honeypot + einfache Math-Captcha
- **Hosting-Annahme:** klassischer Webspace mit PHP, kein Node erforderlich

---

## 3. Verzeichnisstruktur

```
/
├── index.php                    # Startseite (Unser Unternehmen)
├── leistungen.php               # Leistungsübersicht
├── gewerke.php                  # Fachthemen / Produkte
├── referenzen.php               # Galerie (vorher: Beispielfotos)
├── referenz-fernwaerme.php      # Detail-Case Fernwärmestation
├── partner.php
├── kontakt.php
├── kontakt-submit.php           # Form-Handler
├── datenschutz.php
├── impressum.php
├── 404.php
├── sitemap.xml                  # generiert
├── robots.txt
├── .htaccess                    # Pretty URLs, HTTPS-Redirect, Caching
│
├── /includes
│   ├── header.php               # <head>, Top-Nav, Logo
│   ├── footer.php               # Kontaktblock, Copyright, Links
│   ├── nav.php                  # Hauptnavigation
│   ├── cookie-banner.php        # TTDSG-konformer Consent
│   ├── meta.php                 # Schema.org LocalBusiness JSON-LD
│   └── config.php               # Konstanten (NAP, Mail-Settings)
│
├── /assets
│   ├── /css
│   │   ├── main.css             # Design-System + Layout
│   │   └── print.css
│   ├── /js
│   │   ├── main.js              # Mobile Nav, Lightbox, Form-Validierung
│   │   ├── lightbox.js          # Galerie-Lightbox
│   │   └── consent.js           # Cookie-Banner-Logik
│   ├── /img                     # bestehend — Logo + globale Bilder
│   │   └── /projekte            # bestehend — Projekt-Galerie
│   └── /icons                   # SVG-Icons
│
└── /data
    └── projekte.php             # Galerie-Daten als PHP-Array
```

---

## 4. Design-Philosophie & Anti-AI-Slop-Manifest

> **Diese Sektion ist die wichtigste der gesamten Spezifikation. Wenn ein Konflikt zwischen einer Anweisung weiter unten und den Regeln hier entsteht, gewinnen die Regeln hier.**

### 4.1 Was die Seite SEIN soll

Die Seite soll wirken wie der Mann, der sie betreibt: ein Meister, der seit Jahrzehnten in Flensburg in Bädern, auf Dächern und in Heizungskellern steht. Sie soll **handgemacht** wirken, nicht zusammengeklickt. Sie soll **Material** atmen — Backstein, verzinktes Blech, Eichenholz, Kupferrohr, Beton, Mörtel. Sie soll **Vertrauen durch Substanz** ausstrahlen, nicht durch Hochglanz-Marketing.

Stell dir vor, Tilman Handler hätte einen Designer, der 30 Jahre für Werften und Tischlereien an der Förde gearbeitet hat — das ist die Tonalität.

### 4.2 Was die Seite NICHT sein darf — Anti-AI-Slop-Liste

Die folgenden Dinge sind **verboten**. Wenn ein Vorschlag oder generierter Code eines davon enthält, sofort verwerfen und neu machen.

**Visuell verboten:**

- **KEINE EMOJIS.** Nirgendwo. Nicht in Headlines, nicht in Cards, nicht in Buttons, nicht in Bullet-Points, nicht im Footer, nicht im Cookie-Banner, nicht in Form-Validierungs-Messages, nicht in Toast-Notifications, nicht in Alt-Texten. Null. Nada. Keins.
- **Keine Standard-Sans-Serif-Schriftarten** wie Inter, Roboto, Open Sans, Poppins, Lato, Montserrat, Nunito, system-ui-Fallback als Hauptschrift. Diese signalisieren sofort „AI-generierte Webseite".
- **Keine generischen Stock-Icons** aus Feather, Heroicons, Bootstrap Icons, Font Awesome, Lucide. Wenn Icons, dann custom SVG mit dickem Strich, eckig, fast technisch — oder gar keine.
- **Keine Gradients** auf Buttons, Hintergründen, Headlines. Keine `linear-gradient(135deg, #...)`-Konstruktionen. Volltöne oder Texturen.
- **Keine glow-Effekte, neon-Schatten, Glassmorphism, Blur-Backdrops.** Das ist Tech-Bro-Ästhetik.
- **Keine perfekt zentrierten 3-Spalten-Card-Grids** mit identischen Icons darüber. Cards dürfen unterschiedlich groß sein, dürfen aus dem Raster ausbrechen, dürfen Ecken haben.
- **Keine Pill-Shapes** (`border-radius: 9999px`). Buttons dürfen leicht abgerundet sein (max. 4px) oder komplett kantig.
- **Keine Soft-Shadows** mit großen Blur-Radien (`box-shadow: 0 20px 40px rgba(0,0,0,0.05)`). Wenn Schatten, dann hart und versetzt wie Druck-Schatten.
- **Keine animierten Gradient-Hover-States** auf Buttons.
- **Keine Hero-Section** mit großem zentriertem Text und floatendem CTA über Stockphoto. Stattdessen: klare Foto-Dominanz mit asymmetrischem Text-Block.
- **Keine Lottie-Animationen, keine Tilt-Karten, keine Scroll-getriggerten Fade-Ins** auf jedem Element.
- **Keine generischen 3D-Renderings, Isometric Illustrations, Mesh-Gradients.**
- **Keine Stock-Bilder.** Es gibt 47 echte Projekt-Fotos in `assets/img/projekte/` — die sind das Kapital der Seite. Keine Unsplash-Handwerker-Stockfotos einbauen.
- **Keine Avatar-Kreise mit fiktiven Testimonial-Personen** („Maria S., 47, sagt…").

**Sprachlich verboten:**

- **Keine Marketing-Floskeln** wie „Wir liefern Exzellenz", „Ihr verlässlicher Partner", „Premium-Qualität seit Tag eins", „Maßgeschneiderte Lösungen für anspruchsvolle Kunden", „Mit Leidenschaft für Ihr Projekt", „Wir sind Ihr Team für…".
- **Keine generischen CTAs** wie „Jetzt durchstarten", „Lass uns reden", „Hop on a call". Stattdessen handwerklich-direkt: „Anfrage schicken", „Termin auf der Baustelle", „Rückruf bekommen".
- **Keine englischen Buzzwords** im deutschen Fließtext (kein „Workflow", „Mindset", „Game-Changer", „Next-Level", „State-of-the-Art").
- **Keine generischen Section-Headlines** wie „Über uns", „Was wir tun", „Unsere Werte", „Warum wir?" → ersetzen durch konkrete: „Wer hier arbeitet", „Was wir bauen", „Wofür wir stehen".
- **Keine Drei-Wort-Slogans** auf Hochglanz („Sauber. Solide. Schnell.").
- **Originaltexte aus der Bestandsseite haben Vorrang.** Tilmans Ton ist persönlich, fast briefartig („Lieber Besucher unserer Webseite") — diese Persönlichkeit erhalten und nicht in Marketing-Sprech ummodeln.

**Strukturell verboten:**

- **Keine 5+ Sektionen auf der Startseite**, die mit „Hero → Features → Stats → Testimonials → CTA" abgearbeitet werden. Das ist das SaaS-Landing-Page-Schema und passt nicht zu einem Handwerksbetrieb.
- **Keine FAQ-Akkordeons** mit erfundenen Standardfragen.
- **Keine Newsletter-Signups, keine Pop-ups, keine Exit-Intent-Modale.**
- **Keine „Verfügbar in X Städten"-Marker** mit Deutschland-Karte.

### 4.3 Typografie — Anti-Standard

Wir nutzen **zwei Schriftfamilien**, beide selbst-gehostet (`/assets/fonts/`), beide mit eindeutigem Charakter:

**Display / Headlines: Fraunces**
- Variable Font, OFL-Lizenz, von Google Fonts download- und selbsthostbar
- Moderne Serif mit echtem Charakter — leichte Kontraste, weiche Bögen, optische Größen-Achse
- Wirkt wie eine alte Werkstattschrift, die jemand neu interpretiert hat
- Verwendung: H1, H2, große Zitate, Kapitelmarker
- Settings: `font-variation-settings: "opsz" 144, "SOFT" 50, "WONK" 1;` für Display
- Weights: 400 (Body-Display), 600 (mittlere Headlines), 800 (große Headlines)

**Body / UI: IBM Plex Sans**
- OFL-Lizenz, selbsthostbar
- Hat technisch-präzisen Charakter (IBM hat sie für Engineering-Dokumente entwickelt) — passt zum technischen Handwerksbetrieb
- Nicht generisch wie Inter, hat erkennbare Eigenheiten in `a`, `g`, `R`
- Weights: 400 Regular, 500 Medium, 600 Semibold, 700 Bold

**Akzent / Tabellen / Maße: IBM Plex Mono**
- Für Telefonnummern, Maße, Kennzahlen, USt-ID, Registernummer
- Verstärkt den technischen Werkstatt-Charakter

```css
@font-face {
  font-family: 'Fraunces';
  src: url('/assets/fonts/Fraunces-VariableFont.woff2') format('woff2-variations');
  font-weight: 100 900;
  font-display: swap;
}
@font-face {
  font-family: 'IBM Plex Sans';
  src: url('/assets/fonts/IBMPlexSans-Regular.woff2') format('woff2');
  font-weight: 400;
  font-display: swap;
}
/* + weitere Weights für Plex Sans (500, 600, 700) und Plex Mono (400, 500) */

:root {
  --font-display: 'Fraunces', Georgia, serif;
  --font-body: 'IBM Plex Sans', -apple-system, sans-serif;
  --font-mono: 'IBM Plex Mono', 'Courier New', monospace;
}
```

**Größen-Skala** (modular, leicht unregelmäßig — nicht der Standard-1.25-Step):

```css
:root {
  --fs-xs: 0.8125rem;   /* 13px – Meta */
  --fs-sm: 0.9375rem;   /* 15px – kleine Texte */
  --fs-base: 1.0625rem; /* 17px – Body, größer als Standard 16 */
  --fs-md: 1.25rem;     /* 20px – Lead */
  --fs-lg: 1.75rem;     /* 28px – H3 */
  --fs-xl: 2.5rem;      /* 40px – H2 */
  --fs-2xl: 3.75rem;    /* 60px – H1 */
  --fs-3xl: 5.5rem;     /* 88px – Hero-Display */
}
```

**Verwendungsregeln:**

- H1 in Fraunces 800, line-height 0.95, letter-spacing -0.02em
- H2 in Fraunces 600, line-height 1.05
- H3 in IBM Plex Sans 600 (bewusster Wechsel — nicht alle Headlines in Serif)
- Body in IBM Plex Sans 400, line-height 1.55
- Telefonnummern, Maße, Kennzahlen in IBM Plex Mono
- Keine `text-transform: uppercase` außer für Eyebrow-Labels (die sehr selten sind)
- Hyphenation aktivieren: `hyphens: auto` mit deutschem Lang-Tag

### 4.4 Farbpalette — Werkstatt statt Tech

Erdige, gedämpfte Töne. Kein generisches Corporate-Blau, kein quietsch-orangener CTA.

```css
:root {
  /* Grundpalette – Papier & Tinte */
  --paper: #f2ede4;          /* warmer Cremeton, kein steriles Weiß */
  --paper-deep: #e6dfd1;     /* tieferer Papier-Ton für Sektionen */
  --ink: #1c1a16;            /* fast-schwarz mit warmem Unterton */
  --ink-soft: #3a352d;       /* gedämpfter Body-Text */
  --ink-muted: #6b6358;      /* Meta-Text */

  /* Werkstatt-Akzente */
  --rust: #8b3a1f;           /* Rost – Hauptakzent für CTAs, Links, Highlights */
  --rust-deep: #5e2613;      /* Hover-State Rost */
  --copper: #b87333;         /* Kupfer – sekundärer Akzent, sparsam */
  --moss: #4a5d3a;           /* Moos – Erfolgsmeldungen, Tags */
  --steel: #525049;          /* Stahl – neutrale UI-Linien */

  /* UI */
  --border: #d4cdbf;         /* Trennlinien, Card-Borders */
  --border-strong: #1c1a16;  /* harte Trennlinien, Druckschatten */
}
```

**Verwendungsregeln:**

- Body-Hintergrund: `--paper` (NICHT `#fff`)
- Sektion-Wechsel durch `--paper-deep` oder durch dicke schwarze Trennlinien (`border-top: 2px solid var(--border-strong)`)
- Primärer CTA: `--ink` Hintergrund + `--paper` Text. Sekundärer CTA: `--rust` Hintergrund + `--paper`. Ghost-Button: nur `--ink`-Border, kein Fill.
- Links im Fließtext: `--rust` mit `text-decoration: underline; text-underline-offset: 3px; text-decoration-thickness: 1.5px;`
- KEINE Halb-Transparenzen für Backgrounds (`rgba(...)` ist okay für Schatten und Overlays über Bildern, aber nicht für Sektion-BGs)

### 4.5 Layout & Form

```css
:root {
  --container-max: 1280px;
  --container-narrow: 720px;
  --space-1: 0.5rem;
  --space-2: 1rem;
  --space-3: 1.5rem;
  --space-4: 2rem;
  --space-6: 3rem;
  --space-8: 4.5rem;
  --space-12: 7rem;

  /* Eckig, nicht rund */
  --radius-sm: 0;            /* DEFAULT IST KEIN RADIUS */
  --radius-md: 2px;          /* minimal, nur wo wirklich nötig */
  --radius-lg: 4px;          /* Buttons */

  /* Druck-Schatten – hart, versetzt, fast tactile */
  --shadow-print: 4px 4px 0 var(--ink);
  --shadow-print-sm: 2px 2px 0 var(--ink);
  --shadow-soft: 0 1px 0 var(--border);  /* nur eine Linie */
}
```

**Form-Sprache:**

- **Kantig.** Default `border-radius: 0`. Buttons dürfen 2-4px haben, sonst nichts.
- **Dicke schwarze Linien** als Trennelemente zwischen Sektionen (`border-top: 2px solid var(--ink)`) statt sanfter Schatten.
- **Druck-Schatten** auf Hover wichtiger Elemente: Element verschiebt sich um 2px und der harte Schatten zeigt sich (`transform: translate(-2px, -2px); box-shadow: 4px 4px 0 var(--ink);`). Das simuliert einen Stempel-Effekt.
- **Asymmetrische Layouts.** Hero-Section: Bild links bündig, Text rechts mit Versatz. Zwei-Spalter sind nicht 50/50, sondern 60/40 oder 70/30.
- **Sichtbares Raster.** Auf Desktop dürfen vertikale Hairlines (`1px solid var(--border)`) zwischen Spalten stehen wie auf Bauplänen.
- **Nummerierte Sektionen.** Wichtige Sektionen tragen eine kleine Mono-Nummer als Eyebrow: `01 / Leistungen`, `02 / Fachthemen`. Das gibt dokumentartige Struktur.

### 4.6 Bildbehandlung

- **Originalfotos sind König.** Niemals durch Stock-Bilder ersetzen.
- **Vorher/Nachher** wird zentral inszeniert — entweder als Slider mit Trennlinie oder als 2-Spalter mit Beschriftung „VORHER" / „NACHHER" in Mono-Schrift.
- **Bild-Captions** in IBM Plex Mono, klein, mit Maß-Angaben oder Werk-Daten wenn möglich (z.B. „Bad Komplettsanierung · Flensburg-Nord · 2023").
- **Duotone-Behandlung** der Hintergrund-Bilder im Hero erlaubt: `--ink` und `--paper` als Duotone via CSS `filter` oder vorab in Photoshop. Das vereinheitlicht uneinheitliches Bildmaterial.
- **Schwarz-Weiß-Mix** für Portraits/Werkstatt-Stimmung erlaubt, Farbe für Bad/Fassade-Ergebnisse.

### 4.7 Bewegung

- Bewegung ist **selten und funktional**. Kein Fade-In auf jedem zweiten Element beim Scrollen.
- Erlaubt: Hover-States (Druck-Schatten-Effekt s.o.), Lightbox-Übergang, Mobile-Nav-Slide-In, Cookie-Banner-Slide-Up.
- Verboten: Parallax, Scroll-Hijacking, animierte Headlines, Scroll-Indikator-Animationen, Ken-Burns-Hero-Bilder.
- `prefers-reduced-motion` respektieren.

### 4.8 Mikro-Details mit Charakter

Diese kleinen Dinge machen den Unterschied zwischen „AI-Webseite" und „handgemacht":

- **Inhaber-Signatur als SVG** im Footer oder Kontaktbereich — Tilman Handler in handgeschriebener Form (digitalisierte echte Unterschrift, falls verfügbar; sonst zunächst weglassen, NICHT durch eine generierte Pseudo-Signatur ersetzen).
- **Werk-Stempel-Element** als wiederkehrendes Motiv: kleines, leicht schräges quadratisches SVG mit „TOS · MEISTERBETRIEB · FLENSBURG · seit [Jahr]" als Kreissatz oder Quadrat-Stempel. Erscheint auf Startseite, Kontakt, Footer.
- **Maße & Zahlen prominent.** „Munketoft 1 · 24941 Flensburg" in Mono. Telefon 0461 9788-7885 in Mono. Das wirkt wie eine Visitenkarte.
- **Eine handgezeichnete Werkstatt-Illustration** ist erlaubt (ein Symbol, max.) — z.B. ein Zollstock, eine Wasserwaage, ein Schraubschlüssel. Nicht aus Icon-Libraries. Wenn nicht beschaffbar, weglassen.
- **Texturierter Hintergrund** subtil: feines Papier-Grain als CSS noise (`background-image: url('data:image/svg+xml;...')` mit `<feTurbulence>`-Filter, sehr niedrige Opacity). Macht die Seite haptisch.
- **Zitat-Block-Stil:** großes Anführungszeichen in Fraunces, links überstehend. Kein Italics-Pseudo-Quote.

### 4.9 Responsiveness

Mobile-first. Breakpoints: 480px, 768px, 1024px, 1280px.

Auf Mobile bleiben die Anti-Slop-Regeln gleich: keine Pill-Buttons, keine soft shadows, kantige Form-Sprache. Mobile-Nav ist eine **vollflächige Overlay-Page**, nicht ein Slide-in mit blurry backdrop.

---

## 5. Globale Komponenten

### Header / Navigation

- Sticky-Top, weißer Hintergrund mit subtiler Schatten-Linie beim Scrollen
- Links: Logo aus `assets/img/logo.png` (oder `2TOS-Brief-Typo.png` falls so heißt)
- Mitte/Rechts: Nav-Links
- Ganz rechts: CTA-Button "Anfrage stellen" (führt zu `/kontakt.php`) + Telefon-Icon mit `tel:+4946197887885`
- Mobile: Burger-Menu, slide-in von rechts

**Navigationsstruktur:**

1. Unternehmen → `/`
2. Leistungen → `/leistungen.php`
3. Fachthemen → `/gewerke.php`
4. Referenzen → `/referenzen.php`
5. Partner → `/partner.php`
6. Kontakt → `/kontakt.php` (als CTA-Button stylen)

### Footer

3-spaltig auf Desktop, gestapelt mobile.

**Spalte 1 – Kontakt:**
```
TOS Handler e.K.
Munketoft 1
24941 Flensburg

Büro: 0461 - 9788 - 7885
Fax:  0461 - 9788 - 9934
Mobil: 0151 - 1443 - 1526
info@tos-handler.de
```

**Spalte 2 – Leistungen (Quick-Links):** Badsanierung, Heizung & Sanitär, Dachdecker- & Klempnerarbeiten, Fassadensanierung, Innenausbau, Mauerwerksabdichtung

**Spalte 3 – Rechtliches:** Impressum, Datenschutz, Kontakt + Logo Drutex (Partner) + Google Business Link

**Footer-Bottom:**
```
© TOS Handler e.K. — Reg-Nr. HRA 8676 FL — USt.-ID-Nr. DE 260 999 553
```

### Cookie-Banner (TTDSG-konform)

- Erscheint beim ersten Besuch unten (Bottom-Sheet)
- Drei Buttons gleichgewichtig: "Alle akzeptieren", "Nur notwendige", "Einstellungen"
- Kategorien: Notwendig (immer aktiv), Statistik (Google Analytics)
- Speicherung in LocalStorage als JSON `{necessary: true, analytics: bool, ts: ...}`
- GA-Snippet wird **erst nach** explizitem Opt-In injiziert

---

## 6. Seitenstruktur & Inhalte

### 6.1 Startseite — `/index.php`

**Hero-Section:**
- Großer Hintergrund: Bild aus `assets/img/projekte/` (vorgeschlagen: ein hochwertiges Bad- oder Fassaden-Foto)
- Overlay dunkel, Text hell
- H1: **„Meisterfachbetrieb für Heizung, Sanitär, Lüftung & Dach — aus einer Hand"**
- Subline: **„Ihr zuverlässiger Partner in Flensburg für Sanierung, Modernisierung und Innenausbau."**
- Zwei CTAs: „Anfrage stellen" (Primary) + „Unsere Leistungen" (Secondary, Ghost)

**Begrüßung (Container-Narrow, weißer Hintergrund):**

> **Lieber Besucher unserer Webseite,**
>
> unser Unternehmen in Flensburg ist ein **Meisterfachbetrieb** für Heizung, Sanitär, Lüftung und Dachdecker-Klempnerarbeiten.
>
> Unsere Firma bietet Ihnen rund um Ihr Objekt fundiertes Fachwissen und zuverlässigen Service komplett aus einer Hand an.
>
> Wir realisieren technische Lösungen und suchen nach Möglichkeiten, um für Sie das bestmöglichste Ergebnis abzuliefern.
>
> Auch bei einem Brand- oder Wasserschaden dürfen Sie uns kontaktieren.
>
> Zusätzlich übernehmen wir Architektenleistungen mit Bauantrag und den notwendigen statischen Berechnungen.
>
> Bei Fragen rufen Sie uns bitte an oder senden uns eine Nachricht.
>
> **Wir beraten Sie gerne.**

**Leistungen-Grid (6 Cards, 3x2 Desktop / 1-spaltig Mobile):**

Jede Card mit Icon, Titel, Kurzbeschreibung (1-2 Sätze), Link „Mehr erfahren":

1. **Badsanierung** – „Komplettbad zum Festpreis aus einer Hand."
2. **Heizung & Sanitär** – „Moderne Heiztechnik, Fernwärme, Regelungstechnik."
3. **Dach & Klempner** – „Gauben, Dacheindeckung, Klempnerarbeiten."
4. **Fassadensanierung** – „Mikroporen-Beschichtung ohne Fungizide."
5. **Innenausbau** – „Vom Rohbau bis zum komfortablen Wohnraum."
6. **Brand- & Wasserschaden** – „Schnelle Sanierung bei Schadensfällen."

**Referenzen-Teaser (3 Cards):**
- „Modernisierung Primär-Fernwärmestation" mit Vorher/Nachher-Bild → Link zu Detail
- „Komplettsanierung Bad" mit Vorher/Nachher
- „Fassadensanierung" mit Vorher/Nachher
- Button: „Alle Referenzen ansehen"

**Trust-Block:**
- Drei Spalten mit großen Zahlen/Icons:
  - „Meisterbetrieb seit Jahrzehnten"
  - „Komplett aus einer Hand"
  - „Eigenes Equipment & Architektenleistungen"

**Kontakt-CTA-Banner (volle Breite, Primary-Hintergrund):**
- „Sie haben ein Projekt? Sprechen Sie direkt mit Tilman Handler."
- Tel-Button + Mail-Button

---

### 6.2 Leistungen — `/leistungen.php`

**H1:** „Unsere Leistungen"

**Intro-Block:**

> **Gebäudetechnik — vom Rohbau bis zum komfortablen Wohnraum.**
>
> Ihre wertvolle Bausubstanz wird erhalten.

**Sechs Hauptgewerke** (als Cards mit Bild oben, Text unten):

1. **Renovierungen und Sanierungen**
2. **Montagen**
3. **Regeltechnik**
4. **Heizung / Lüftung**
5. **Sanitär**
6. **Dachdecker- und Klempnerarbeiten**

**Detail-Liste „Wir bieten Ihnen":**

- Badsanierung aus einer Hand zum Festpreis
- Innenausbau, vom Rohbau bis zum komfortablen Wohnraum
- Sanierungsvorschläge erstellen / umsetzen
- Heizungs-, Lüftungs- und Sanitärarbeiten
- Mauerwerksabdichtung (Negativ- / Passivabdichtung) in verschiedenen Verfahren
- Fassaden-, Dach- und Klempnerarbeiten
- Balkon- und Kellersanierung
- Fugensanierung, Verputz und Maurerarbeiten
- Schimmelpilzbeseitigung und Schimmelprävention mit notwendigen Messungen und Untersuchungen
- Sonderanfertigungen
- Sanierung bei Brand- und Wasserschäden

**Partner-Logos-Strip** (Drutex-Logo): „Wir liefern und montieren Fenster, Türen und Rollladensysteme von Drutex."

---

### 6.3 Fachthemen — `/gewerke.php`

**H1:** „Fachthemen & Produkte"

**Subline:** „Wo wir besser sind als der Standard."

**Vier ausführliche Themen-Blöcke** (jeweils mit Bild links, Text rechts, alternierend):

#### Block 1: Fassadenfarben

> **Information: Fassadenfarben**
>
> Herkömmliche Fassadenfarben (Acrylat, Silikonharz, Silikat) benötigen gegen Moos, Algen und Schimmelbewuchs Fungizide und Biozide als Zuschlagstoffe. Diese vergiften durch Auswaschung das umliegende Erdreich.
>
> Zudem lässt die Funktion nach und die Fassade sieht nach ein paar Jahren wie vorher aus.
>
> Wir bieten Ihnen eine Fassadenfarbe an, die durch ihre Mikroporenstruktur die Oberfläche um das min. 20.000-fache vergrößert und dadurch Feuchtigkeit sehr schnell verdunsten lässt.
>
> Die Ursache für Moos, Algen und Schimmelbefall ist genommen und Wassereinlagerungen werden unterbunden.
>
> Typische Farbabplatzungen und Witterungsschäden gibt es nicht mehr. Durch Feuchtigkeit schwer geschädigte Fassaden trocknen um ein Vielfaches schneller ab.
>
> **Wir demonstrieren Ihnen das gerne an einem Anstrichmodell.**

#### Block 2: Feuchtes Mauerwerk

> **Information: Feuchtes Mauerwerk**
>
> Bei aufsteigender (kapillarer) Feuchtigkeit ist eine kostengünstige und materialschonende Methode das Hydrophobieren des Bauträgers.
>
> Es werden in der Regel fälschlicherweise Verkieselungen eingesetzt, die bei starker Durchfeuchtung bzw. Salzbelastung nicht zugelassen sind und auch nicht funktionieren.
>
> **Wir verwenden Kunstharzlösungen, die in jeder Belastungssituation zugelassen und von der WTA (Wissenschaftlich Technische Prüfanstalt) geprüft und freigegeben worden sind.**

#### Block 3: Sanierungen

> **Gebäudetechnik: Sanierungen**
>
> Allen Sanierungsarbeiten (Bad, Keller, Balkon / Terrasse, Fassade, Flachdach usw.) gehen eine gründliche Planung mit dem Kunden voraus. Wenn notwendig, werden bauphysikalische Untersuchungen angeboten, die mit einem Gutachten dokumentiert werden.
>
> **Wir verfügen über eigene Fassadengerüste, Inspektionskamera mit Speicherung der Bilddatei, Kernbohrmaschinen, Spülgerät zur Anlagen- bzw. Rohrreinigung und Messgeräte zur Feuchtebestimmung im und auf dem Bauträger.**

#### Block 4: Montagen

> **Gebäudetechnik: Montagen**
>
> Wir liefern und montieren Fenster- und Türelemente in Holz, Kunststoff oder Verbundbauweise von Markenherstellern.
>
> Bei uns bekommen Sie alle Nebengewerke (Putz-, Maler-, Trockenbauarbeiten usw.) umgehend mitausgeführt.
>
> Wir renovieren Ihre alte Küche mit neuen Arbeitsplatten und neuer Spüle. Wir liefern und montieren Elektrogeräte mit kostenfreier Entsorgung.
>
> Bei einer Küchenneuplanung verlegen wir bei Bedarf die Installation und übernehmen die Fliesenarbeiten nach der neuen Planung.
>
> **Wenn Sie möchten, montieren wir Ihre Einbauküche gleich mit. Auf Wunsch auch mit Granit- oder Marmor-Arbeitsplatte.**

#### Block 5: Renovierung / Innenausbau

> **Gebäudetechnik: Renovierung / Innenausbau**
>
> Wir bauen Ihren Dachboden und Keller zu hochwertigem Wohnraum aus und ermöglichen Ihnen auch auf engstem Raum ein Bad oder eine Küche.
>
> In der Regel lassen sich Treppen und Wände leicht versetzen, um eine optimale Raumnutzung zu ermöglichen (Wohnraumvergrößerung). Gäste-WC.
>
> In unseren Angeboten sind modernste Dämm-, Putz- und Spachtelprodukte eingerechnet, die feuchtigkeitsregulierend und wohnraumklima-verbessernd sind.
>
> **Wir planen und führen den Innenausbau Ihres Gebäudes durch.**

---

### 6.4 Referenzen — `/referenzen.php`

**H1:** „Referenzen — Beispielfotos unserer Arbeiten"

**Filter-Leiste** (Buttons, JS-gesteuert):
- Alle / Bad / Küche / Dach / Fassade / Innenausbau / Spezial

**Galerie-Grid** (Masonry oder CSS-Grid mit `grid-auto-flow: dense`)

Klick auf Bild öffnet Lightbox mit:
- Großes Bild
- Titel
- Vor/Zurück-Navigation
- ESC-Close, Klick außerhalb schließt

**Galerie-Datenstruktur** (`/data/projekte.php`):

```php
<?php
return [
    ['file' => 'IMG_8620.jpg',                              'title' => 'Sanierung Bad – vorher',     'cat' => 'bad',        'pair' => 'IMG_8823.jpg'],
    ['file' => 'IMG_8823.jpg',                              'title' => 'Sanierung Bad – nachher',    'cat' => 'bad'],
    ['file' => 'alu1.jpg',                                  'title' => 'Aluelemente – Geländer',     'cat' => 'spezial'],
    ['file' => 'alu.jpg',                                   'title' => 'Aluelemente mit Sicherheitsverglasung', 'cat' => 'spezial'],
    ['file' => 'kita-img_1589.jpg',                         'title' => 'KiTa Sanierung',             'cat' => 'innenausbau'],
    ['file' => 'kita-img_1587.jpg',                         'title' => 'KiTa Bad',                    'cat' => 'bad'],
    ['file' => 'kita-img_1588.jpg',                         'title' => 'KiTa Kücheneinbau',          'cat' => 'kueche'],
    ['file' => '50-IMG_0187.jpg',                           'title' => 'Küchenzeile',                 'cat' => 'kueche'],
    ['file' => '50-IMG_0014.jpg',                           'title' => 'Küchenzeile',                 'cat' => 'kueche'],
    ['file' => '00059.jpg',                                 'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => '1000-volquardsen-img_4410-kl.jpg',          'title' => 'Duschen',                     'cat' => 'bad'],
    ['file' => '1000-volquardsen-img_4426-kl.jpg',          'title' => 'Badaccessoires',              'cat' => 'bad'],
    ['file' => '1000-volquardsen-img_4425-kl.jpg',          'title' => 'Schöne Bäder',                'cat' => 'bad'],
    ['file' => 'kita-img_1591.jpg',                         'title' => 'KiTa Sanierung',              'cat' => 'innenausbau'],
    ['file' => '1IMG_0533.jpg',                             'title' => 'Pflasterarbeiten',           'cat' => 'spezial'],
    ['file' => 'img_7502.jpg',                              'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'img_7501.jpg',                              'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'Fassade_2.jpg',                             'title' => 'Fenstersanierungen',          'cat' => 'fassade'],
    ['file' => 'gaube-1000-IMG_0642.JPG',                   'title' => 'Dacharbeiten',                'cat' => 'dach'],
    ['file' => 'Haus.jpg',                                  'title' => 'Renovierung Haus',            'cat' => 'fassade'],
    ['file' => 'fenster-1000-IMG_0637.JPG',                 'title' => 'Fenster und Gaube',           'cat' => 'dach'],
    ['file' => '1fass-img_1272.jpg',                        'title' => 'Hausfassade',                 'cat' => 'fassade'],
    ['file' => 'img_2228.jpg',                              'title' => 'Dacharbeiten – Gaube',        'cat' => 'dach'],
    ['file' => 'Zaun.jpg',                                  'title' => 'Zäune',                       'cat' => 'spezial'],
    ['file' => '1fertig_fass1188.jpg',                      'title' => 'Hausfassade',                 'cat' => 'fassade'],
    ['file' => '1000-lafrenz-img_4376-kl.jpg',              'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'Fassade.jpg',                               'title' => 'Schöne Fassade',              'cat' => 'fassade'],
    ['file' => 'Gaube.jpg',                                 'title' => 'Gaube',                       'cat' => 'dach'],
    ['file' => '1-bad_nachher_1129.jpg',                    'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => '00-malaschewsk-img_4501-kl.jpg',            'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'Dusche_3.jpg',                              'title' => 'Duschen',                     'cat' => 'bad'],
    ['file' => 'Waschtisch.jpg',                            'title' => 'Bäderwelten – Waschtisch',    'cat' => 'bad'],
    ['file' => 'Fassade_3.jpg',                             'title' => 'Fassadenarbeiten',            'cat' => 'fassade'],
    ['file' => 'Badezimmer.jpg',                            'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'Armaturen.jpg',                             'title' => 'Regendusche',                 'cat' => 'bad'],
    ['file' => 'Fassade_4.jpg',                             'title' => 'Hausfassade',                 'cat' => 'fassade'],
    ['file' => 'Bad_V.jpg',                                 'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'Abfluss.jpg',                               'title' => 'Duschfliesen',                'cat' => 'bad'],
    ['file' => '200-kmo25.jpg',                             'title' => 'Küchenzeile',                 'cat' => 'kueche'],
    ['file' => '3bad_lorenzens.jpg',                        'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => 'Dach_Rohbau.jpg',                           'title' => 'Dacharbeiten',                'cat' => 'dach'],
    ['file' => '425-giebel.JPG',                            'title' => 'Fassade',                     'cat' => 'fassade'],
    ['file' => '1tuerimg_1340.jpg',                         'title' => 'Haustüren',                   'cat' => 'spezial'],
    ['file' => '1haustr_1116.jpg',                          'title' => 'Haustüren',                   'cat' => 'spezial'],
    ['file' => '150-wore16.jpg',                            'title' => 'Wohnraumgestaltung',          'cat' => 'innenausbau'],
    ['file' => '1000-malaschewsk-img_4501-kl.jpg',          'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => '1000-volquardsen-img_4391-kl.jpg',          'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => '0057.jpg',                                  'title' => 'Bäderwelten',                 'cat' => 'bad'],
    ['file' => '1000-lafrenz-img_4387-kl.jpg',              'title' => 'Bäderwelten',                 'cat' => 'bad'],
];
```

> **Hinweis für Copilot:** Falls die Bilddateinamen lokal anders heißen, das Array entsprechend anpassen — die Reihenfolge entspricht der Original-Galerie. Bilder liegen alle in `assets/img/projekte/`.

**CTA am Ende:** „Auch Ihr Projekt anfragen" → Kontakt

---

### 6.5 Referenz-Detail Fernwärmestation — `/referenz-fernwaerme.php`

**H1:** „Modernisierung einer Primär-Fernwärmestation"

**Beispiel 1:**

> An einer alten Anlage wurden in den letzten Jahren unnötigerweise Pumpen, Mischer und Ventile getauscht. *(Foto: Zustand vorher — `1IMG_9145.png`)*
>
> Als unser Unternehmen den Auftrag bekam, einen Ausfall der Warmwasserversorgung zu beheben, stellten wir fest, dass die Überbleibsel einer alten Ölheizung unnötig sind, da seit über 20 Jahren ein Fernwärmeanschluss für die Wärmeversorgung sorgt. *(Foto: Umbau)*
>
> Nach dem Umbau durch unser Unternehmen sparte der Kunde erhebliche Betriebskosten für Strom und Wärme ein. *(Foto: nach dem Umbau — `1IMG_9144.png`)*

**Beispiel 2 — Modernisierung:**

- Vor der Modernisierung: `IMG_8990.jpg`
- Abschluss der Modernisierung: `IMG_9136.jpg`

Layout: Vorher/Nachher als Slider (oder simpel als 2-Spalten-Grid).

---

### 6.6 Partner — `/partner.php`

**H1:** „Unsere Partner"

**Intro:** „Bewährte Zusammenarbeit mit lokalen Spezialisten."

**Partner-Liste** (jeweils Card mit Logo-Platzhalter, Name, Branche):

1. **MC – Bauputz, Flensburg** — Putz- und Stuckateurarbeiten
2. **Elektro- und Haustechnik Staron** — Elektroinstallation
3. **Drutex** — Fenster, Türen, Rollladensysteme (Lieferant)

---

### 6.7 Kontakt — `/kontakt.php`

**H1:** „Wir freuen uns über eine Nachricht"

**Intro:** „Füllen Sie dieses Formular aus, wenn Sie weitere Informationen benötigen. Wir treten schnellstmöglich mit Ihnen in Verbindung."

**Layout:** 2-Spalten Desktop (Kontaktdaten links, Formular rechts), gestapelt mobile.

**Kontaktdaten-Spalte:**

```
Tilman Handler
Munketoft 1
24941 Flensburg

Telefon Büro:  0461 - 9788 - 7885
Fax:           0461 - 9788 - 9934
Mobil:         0151 - 1443 - 1526
E-Mail:        info@tos-handler.de
```

Plus eingebettete OpenStreetMap (kein Google Maps wegen Datenschutz; oder GMap nur nach Consent).

**Formular-Spalte:**

Felder:
- Name * (text)
- E-Mail * (email)
- Telefonnummer (tel)
- Wie sind Sie auf uns aufmerksam geworden? (Select: Internetsuche / Empfehlungen / Medienbericht)
- Ihre Anfrage * (textarea, min. 10 Zeichen)
- Honeypot-Feld `website` (hidden, muss leer bleiben)
- Datenschutz-Checkbox: „Ich habe die Datenschutzerklärung zur Kenntnis genommen." *
- Submit-Button: „Anfrage absenden"

**Validierung:** Client-side via JS, server-side in `kontakt-submit.php` als Hard-Gate. Mail an `info@tos-handler.de` via PHPMailer (SMTP-Credentials in `config.php`, ENV-Variablen verwenden).

---

### 6.8 Datenschutz — `/datenschutz.php`

Originaltexte 1:1 übernehmen — sind aktuell schon e-recht24-Standard und im Wesentlichen DSGVO-konform. **Wichtig:** Den Google-Analytics-Abschnitt erweitern um den Hinweis, dass GA nur nach Cookie-Consent geladen wird.

Inhalte (alle aus dem Original):
- Allgemeiner Hinweis und Pflichtinformationen
- Benennung der verantwortlichen Stelle
- Widerruf der Einwilligung
- Recht auf Beschwerde bei der Aufsichtsbehörde
- Recht auf Datenübertragbarkeit
- Recht auf Auskunft, Berichtigung, Sperrung, Löschung
- SSL-/TLS-Verschlüsselung
- Server-Log-Dateien
- Registrierung auf der Website *(falls keine Registrierung implementiert wird, diesen Abschnitt entfernen)*
- Kontaktformular
- Cookies
- Google Analytics (mit IP-Anonymisierung, Browser-Plugin-Hinweis, Widerspruch, Auftragsverarbeitung, demografische Merkmale)

Quellen-Hinweis am Ende: „Quelle: Datenschutz-Konfigurator von mein-datenschutzbeauftragter.de"

---

### 6.9 Impressum — `/impressum.php`

Originaltexte 1:1:

```
Angaben gemäß § 5 TMG:

TOS-Handler e.K.
Munketoft 1
24941 Flensburg

USt.-ID-Nr. DE 260 999 553

Vertreten durch:
Knebel-Handler, Tilman

Kontakt:
Telefon: +49 (0) 461 - 9788 - 7885
Telefax: +49 (0) 461 - 9788 - 9934
Mobil:   +49 (0) 151 - 1443 - 1526
E-Mail:  info@tos-handler.de

Eintragung im Handelsregister:
Registergericht: Amtsgericht Flensburg
Registernummer: HRA 8676 FL

Aufsichtsbehörde:
GA Flensburg

Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV:
Knebel-Handler, Tilman
```

**Bildquellen-Block:**
```
Galerie + Fotos: Tilman Handler, Sebastian Iwersen, Guido Rohde, Elmar Steup
Grafiken: designed by Macrovector — Freepik.com
Fotolia: Daniel Ernst (Vektor-ID #53350843)
```

**Haftungsausschluss-Blöcke** (alle Originaltexte beibehalten):
- Haftung für Inhalte
- Haftung für Links
- Urheberrecht
- Haftungsausschluss

Quelle: e-recht24.de

---

## 7. SEO & Strukturierte Daten

### Title-Tags pro Seite

- **Start:** `Heizung, Sanitär & Dachdecker Flensburg | TOS Handler — Meisterfachbetrieb`
- **Leistungen:** `Leistungen | Badsanierung, Heizung, Sanitär, Dach | TOS Handler Flensburg`
- **Gewerke:** `Fassadensanierung, Mauerwerksabdichtung & Innenausbau | TOS Handler`
- **Referenzen:** `Referenzen & Beispielfotos | TOS Handler Flensburg`
- **Fernwärme:** `Modernisierung Fernwärmestation — Referenz | TOS Handler`
- **Partner:** `Partner | TOS Handler Flensburg`
- **Kontakt:** `Kontakt & Anfrage | TOS Handler Flensburg`
- **Datenschutz:** `Datenschutzerklärung | TOS Handler`
- **Impressum:** `Impressum | TOS Handler e.K. Flensburg`

### Meta-Description

Für jede Seite einzigartig, 150–160 Zeichen, Keyword + USP + lokaler Bezug.

### Schema.org JSON-LD

In `includes/meta.php` global einbinden:

```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "@id": "https://tos-handler.de/#business",
  "name": "TOS Handler e.K.",
  "image": "https://tos-handler.de/assets/img/logo.png",
  "url": "https://tos-handler.de",
  "telephone": "+4946197887885",
  "email": "info@tos-handler.de",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Munketoft 1",
    "postalCode": "24941",
    "addressLocality": "Flensburg",
    "addressCountry": "DE"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 54.7836,
    "longitude": 9.4321
  },
  "areaServed": ["Flensburg", "Schleswig-Holstein", "Glücksburg", "Harrislee"],
  "priceRange": "€€",
  "vatID": "DE260999553"
}
```

Auf Referenz-Detailseiten zusätzlich `Article` oder `Project`-Schema.

### Sitemap & Robots

- `sitemap.xml` automatisch aus Seiten-Array generieren
- `robots.txt`: alle erlauben, Sitemap-Verweis

---

## 8. Performance-Anforderungen

- **Lighthouse-Ziel:** Performance ≥ 90, SEO ≥ 95, Accessibility ≥ 95, Best Practices ≥ 95
- **Bilder:** WebP-Versionen mit JPG-Fallback via `<picture>`-Tag, alle Galerie-Bilder mit `loading="lazy"`, `decoding="async"`, `width`/`height`-Attributen
- **CSS:** Kritisches CSS inline im `<head>`, Rest via `<link rel="stylesheet">`
- **JS:** Defer alle Scripts, kein blockierendes JS
- **Fonts:** System-Stack als Default, optional Inter via `<link rel="preconnect">` zu Google Fonts (oder selfhosted)
- **Caching:** `.htaccess` mit `Cache-Control` für Assets (1 Jahr) und HTML (1 Stunde)
- **Compression:** Gzip/Brotli aktivieren

---

## 9. .htaccess-Vorgaben

```apache
RewriteEngine On

# HTTPS erzwingen
RewriteCond %{HTTPS} off
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]

# www entfernen (oder erzwingen — entscheiden)
RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
RewriteRule ^ https://%1%{REQUEST_URI} [R=301,L]

# Pretty URLs (z. B. /leistungen statt /leistungen.php)
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^.]+)$ $1.php [NC,L]

# 301-Redirects von Alt-URLs (sehr wichtig für SEO!)
RewriteRule ^index\.php/?$                                  /                       [R=301,L]
RewriteRule ^index\.php/features/?$                         /leistungen             [R=301,L]
RewriteRule ^index\.php/features/gewerke/?$                 /gewerke                [R=301,L]
RewriteRule ^index\.php/beispiele/?$                        /referenzen             [R=301,L]
RewriteRule ^index\.php/beispiele/fernwaermestation/?$      /referenz-fernwaerme    [R=301,L]
RewriteRule ^index\.php/2014-05-13-19-05-45/?$              /partner                [R=301,L]
RewriteRule ^index\.php/datenschutzerklaerung/?$            /datenschutz            [R=301,L]
RewriteRule ^index\.php/kontakt/?$                          /kontakt                [R=301,L]
RewriteRule ^index\.php/impressum/?$                        /impressum              [R=301,L]

# Caching
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType image/webp "access plus 1 year"
  ExpiresByType image/jpeg "access plus 1 year"
  ExpiresByType image/png "access plus 1 year"
  ExpiresByType text/css "access plus 1 month"
  ExpiresByType application/javascript "access plus 1 month"
  ExpiresByType text/html "access plus 1 hour"
</IfModule>
```

---

## 10. Accessibility

- Semantisches HTML5 (`<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`)
- Alle Bilder mit aussagekräftigem `alt` (aus dem Galerie-Array `title`-Feld)
- Tastatur-Navigation muss funktionieren (Tab, Enter, ESC für Lightbox)
- Fokus-Stile sichtbar (kein `outline: none` ohne Ersatz)
- Kontrast min. WCAG AA (4.5:1)
- Skip-Link „Zum Hauptinhalt" am Seitenanfang
- ARIA-Labels für alle Icon-Buttons

---

## 11. Akzeptanzkriterien (Definition of Done)

- [ ] Alle 9 Seiten existieren mit den oben definierten Inhalten
- [ ] Alle 47 Galerie-Bilder werden mit Lightbox angezeigt
- [ ] Mobile Navigation funktioniert (Burger → Slide-in)
- [ ] Kontaktformular sendet Mail erfolgreich an `info@tos-handler.de`
- [ ] Honeypot blockt Spam
- [ ] Cookie-Banner erscheint beim ersten Besuch, GA lädt erst nach Opt-In
- [ ] Alle 8 alten Joomla-URLs werden per 301 auf neue URLs weitergeleitet
- [ ] Lighthouse Performance ≥ 90 auf Mobile
- [ ] Schema.org JSON-LD validiert auf schema.org/validator
- [ ] Alle Bilder als WebP mit JPG-Fallback ausgeliefert
- [ ] Cross-Browser getestet: Chrome, Safari, Firefox, Edge
- [ ] Responsive getestet: 375px, 768px, 1024px, 1440px

---

## 12. Build-Reihenfolge für Copilot

Arbeite in dieser Reihenfolge — jeder Schritt ein Commit:

1. **Setup:** `.htaccess`, Verzeichnisstruktur, `config.php`, `composer.json` mit PHPMailer
2. **Design-System:** `main.css` mit allen Custom Properties + Resets + Utility-Klassen
3. **Globale Includes:** `header.php`, `footer.php`, `nav.php`, `meta.php`
4. **Cookie-Banner:** `cookie-banner.php` + `consent.js`
5. **Statische Seiten:** `impressum.php`, `datenschutz.php`, `partner.php` (einfachste zuerst, um Layout-System zu validieren)
6. **Inhaltsseiten:** `leistungen.php`, `gewerke.php`
7. **Galerie:** `referenzen.php` + `data/projekte.php` + `lightbox.js`
8. **Referenz-Detail:** `referenz-fernwaerme.php`
9. **Kontakt:** `kontakt.php` + `kontakt-submit.php` mit PHPMailer
10. **Startseite:** `index.php` als finaler Schliff (Hero, Trust-Block, Teaser zu allem anderen)
11. **SEO:** `sitemap.xml`-Generator, `robots.txt`, Schema-LD-Validation
12. **Performance:** WebP-Konvertierung aller Bilder in `assets/img/projekte/`, Lazy Loading überall
13. **QA:** Cross-Browser-Test, Lighthouse, alte URL-Redirects, Form-Test

---

## 13. Wichtige Constraints

**Tech-Constraints:**

- **KEIN Framework** — kein React, kein Vue, kein Tailwind. Vanilla.
- **KEIN Build-Tool zwingend nötig** — direkt deploybar
- **KEINE externen Tracker** außer Google Analytics (und nur nach Consent)
- **KEINE Schriftarten von externen CDNs** — Fraunces und IBM Plex sind selbsthostbar in `/assets/fonts/` als WOFF2
- **KEINE Iframe-Maps** ohne Consent (OpenStreetMap-Static-Image als Default)
- **Alle Originaltexte 1:1 erhalten** — Wortwahl, Tonalität, fachliche Inhalte. Nichts „aufpolieren" oder umformulieren ohne explizite Freigabe.
- **NAP-Daten konsistent halten** zwischen Footer, Impressum, Kontakt, Schema.org

**Anti-Slop Hard-Rules** (Verletzung = sofort verwerfen, neu machen):

- **NULL Emojis.** In keinem File. In keinem Kommentar. In keiner Form-Message. Auch nicht als Unicode-Symbole, die wie Emojis aussehen (✓ ✗ → ★ ✉ ☎). Wenn ein Symbol nötig ist, custom SVG.
- **NULL Inter, Roboto, Poppins, Open Sans, Montserrat, Lato, Nunito, Source Sans, Work Sans, DM Sans** — weder als Hauptschrift noch als Fallback im Code.
- **NULL Heroicons, Feather, Lucide, Bootstrap Icons, Font Awesome.** Custom SVG oder nichts.
- **NULL Gradients, Glassmorphism, Glow, Neon-Schatten, Mesh-Backgrounds.**
- **NULL Pill-Buttons** (`border-radius` über 4px für Buttons ist verboten).
- **NULL Marketing-Floskeln** — kein „Wir liefern Exzellenz", „Ihr verlässlicher Partner", „Premium-Qualität", „Mit Leidenschaft" etc.
- **NULL Stock-Bilder** — nur die echten Projekt-Fotos aus `assets/img/projekte/` verwenden.
- **NULL erfundene Testimonials, FAQ-Akkordeons, Newsletter-Signups, Pop-ups, Exit-Intent-Modals.**
- **NULL englische Buzzwords im deutschen Fließtext.**
- **NULL Standard-3-Spalten-Card-Layouts mit identischen Icons.** Asymmetrie und Variation ist Pflicht.

**Anti-Slop Self-Check vor jedem Commit:**

Bevor Copilot einen Commit macht, prüft es selbst:
1. Habe ich irgendwo ein Emoji, Unicode-Symbol oder Icon-Library-Element eingebaut? → entfernen
2. Habe ich Inter / Roboto / Poppins / etc. eingebaut? → durch Fraunces / IBM Plex ersetzen
3. Habe ich Pill-Buttons oder Soft-Shadows verwendet? → kantige Druck-Shadows nutzen
4. Habe ich Marketing-Phrasen produziert, die nicht im Original-Content stehen? → durch Originaltext oder direkten Handwerkston ersetzen
5. Wirkt die Sektion wie aus einem SaaS-Template? → Asymmetrie einbauen, dicke Trennlinien, Mono-Nummerierung

**Wenn die generierte Lösung wie eine generische Webagentur-Vorlage aussieht, ist sie falsch — auch wenn der Code sauber ist.**

---

## 14. Erste Copilot-Anweisung (zum Reinkopieren)

> „Lies `BUILD_PROMPT.md` im Repo-Root vollständig — insbesondere Abschnitt 4 (Design-Philosophie & Anti-AI-Slop-Manifest) und Abschnitt 13 (Constraints). Diese beiden Abschnitte sind nicht verhandelbar. Bevor du irgendwelchen Code schreibst, bestätige in der Antwort: (a) welche Schriftarten du verwendest, (b) dass du keine Emojis/Icons aus Standard-Libraries einbaust, (c) dass du die Werkstatt-Farbpalette aus 4.4 nutzt. Erstelle anschließend die komplette Verzeichnisstruktur aus Abschnitt 3 und beginne mit Schritt 1 der Build-Reihenfolge: `.htaccess`, `config.php`, `composer.json` mit PHPMailer-Dependency und einem leeren Skeleton aller Seiten-Dateien. Frage nach, falls etwas unklar ist."

---

**Ende der Spezifikation.**
