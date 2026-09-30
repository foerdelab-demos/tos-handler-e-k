# Kundenkorrekturen vom 26.09.2026

Quelle: bereitgestellte Audiodatei (2:31 Minuten), vollständig lokal transkribiert;
Fachbegriffe von 0:35 bis 2:08 in einem zweiten Durchlauf geprüft.
Die Audio wird als Kundenbriefing ausgewertet. Maßgeblicher Auftrag ist die
Umsetzung der Website-Anpassungen und der Austausch der Projektfotos.

## Plan

1. Hero: „Fachbetrieb in Flensburg“. Beratungstext:
   „Wir beraten Sie ehrlich und kundenorientiert, planen Ihr Projekt mit
   Fachkenntnis, um die technisch und wirtschaftlich beste Lösung für Sie zu finden.“
   Im Leistungs-Index nur Gebäudesanierung, Gebäudetechnik, Renovierung anzeigen.
   Bestehende Anker bleiben; keine zusätzlichen Unterseiten.
2. Gebäudesanierung: Betonsanierung, Schimmelsanierung, Bautrocknung,
   Mauerwerksabdichtung (WTA-geprüft), Brand- und Wasserschäden,
   Fassadensanierung, Architektenleistungen (Bauanträge und Statik).
3. Gebäudetechnik: Heizung & Sanitär mit Fernwärme, Wärmepumpen und
   Badsanierung als Unterpunkten; Elektrotechnik und Lüftung als eigene Punkte.
4. Renovierung: Innenausbau, Malerarbeiten, Bodenbelagsarbeiten, Fenster & Türen,
   Einbauküchen von nobilia und Häcker. Offizielle Hersteller-Schriftzüge ergänzen.
5. Alle 49 bisherigen Projektfotos und das ungenutzte alte Headerbild entfernen.
   Firmenlogo behalten. Originale der neuen Fotos in Downloads unverändert lassen.
   Sieben neue Motive auf der Startseite: Fassade, Heizungsverteilung, Wohnraum;
   im Bilderstreifen Bad, Küche, Dachausbau und Bautrocknung.
   Alle 52 gelieferten Fotos in der Galerie thematisch sortieren.
   Optimierte WebP-Dateien und kleinere Galerie-Vorschaubilder erzeugen.
6. PHP/JavaScript prüfen; alle Bildpfade kontrollieren; Desktop und Mobil
   inklusive Galerie-Filter, Lightbox und Rezensionen testen.

## Auslegung des Briefings

- „Öffnen“ der Begriffe wird als bestehender Sprung zum Leistungsabschnitt
  umgesetzt. Die vereinbarte Onepager-Struktur bleibt bestehen.
- Die Aussage „WTA-geprüft“ wird aus dem Kundenbriefing übernommen,
  nicht unabhängig als Zertifizierung bestätigt.
- Küchenhersteller werden genannt; die Fotos werden keinem Hersteller
  zugeordnet, da die Bilddateien dazu keine verlässliche Information enthalten.
- Kein automatischer Commit oder Push im Rahmen dieses Änderungsauftrags.

## Quellen der Hersteller-Schriftzüge

- nobilia: https://www.nobilia.de/de/
  (Datei: https://www.nobilia.de/fileadmin/html/img/logo_de.png)
- Häcker: https://www.haecker-kuechen.com/de/
  (Datei: https://www.haecker-kuechen.com/_assets/0461cac7cf841c14e085cd32e5c0799e/images/logo_black.svg)

## Umsetzung und Prüfung am 30.09.2026

- Alle sechs Planschritte umgesetzt, keine zusätzlichen Agenten eingesetzt.
- 49 Projektfotos und ein altes Headerbild in den lokalen Papierkorb verschoben
  (`tos-handler-alte-fotos-20260930`); zusätzlich über Git wiederherstellbar.
- 52 neue Hauptbilder plus 52 Vorschauen, alle 104 lokalen Bild-URLs HTTP 200.
- Galerie: Fassade (8), Küche (1), Bad (8), Innenausbau (12), Heizungstechnik (3),
  Dach (4), Sanierung & Trocknung (15), Betrieb (1).
- PHP-Syntaxprüfung und `git diff --check` ohne Fehler.
- Desktop 1440 × 900: Leistungsabschnitte jeweils 828 px hoch (Viewport minus Header).
- Mobil 390 × 844: kein horizontaler Überlauf, beide Herstellerlogos geladen.
- Galerie-Filter für Heizungstechnik und Bad sowie Großansicht und Bildwechsel geprüft.
- Bewertungs-Carousel (6 Karten / 2 Desktop-Seiten) und Volltextdialog geprüft.
- Keine Browser-Konsolenfehler. Änderungen sind lokal, nicht veröffentlicht.
