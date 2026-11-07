<?php
/**
 * projekte-feed.php — Projekte für den Feed unter den Google-Bewertungen
 *
 * Pro Projekt: Titel, optional 'label' (Gewerk/Ort) und die Bilder in vier Töpfen:
 *   'ergebnis'   → wie es jetzt aussieht (das erste Bild eröffnet das Projekt)
 *   'vorher'     → wie es vorher war
 *   'bau'        → während der Arbeiten
 *   'fastfertig' → kurz vor Fertigstellung
 *
 * Reihenfolge im Feed macht der Code automatisch:
 *   Ergebnis → Vorher → Im Bau → Fast fertig → Ergebnis (restliche Ergebnisbilder,
 *   oder das erste noch einmal, wenn es nur eines gibt).
 * Töpfe, die es für ein Projekt nicht gibt, einfach weglassen.
 *
 * Ein Bild ist entweder 'datei.webp' oder ['datei.webp', 'Bildunterschrift'].
 * Die Bildunterschrift erscheint klein auf dem Bild und dient als Alt-Text.
 */

declare(strict_types=1);

return [
    // ---------------- Echte Projekte (Kundenliste) ----------------
    [
        'title'      => 'Komplettsanierung und Umbau zu reinen Wohnzwecken',
        'label'      => 'Gebäudesanierung',
        'ergebnis'   => [
            ['umbau-wohnhaus-ergebnis.webp',             'Das fertige Wohnhaus'],
            ['umbau-wohnhaus-ergebnis-bad.webp',         'Erdgeschoss: Bad'],
            ['umbau-wohnhaus-ergebnis-kueche.webp',      'Erdgeschoss: Küche'],
            ['umbau-wohnhaus-ergebnis-wohnbereich.webp', 'Erdgeschoss: Wohnbereich'],
            ['umbau-wohnhaus-ergebnis-essbereich.webp',  'Erdgeschoss: Essbereich'],
        ],
        'vorher'     => [['umbau-wohnhaus-vorher-friseursalon.webp', 'Vorher: Friseursalon']],
        'bau'        => [
            ['umbau-wohnhaus-bau-geruest.webp',   'Eingerüstet, Umbau läuft'],
            ['umbau-wohnhaus-bau-dachstuhl.webp', 'Dachstuhl'],
            ['umbau-wohnhaus-bau-giebel.webp',    'Giebel neu aufgemauert'],
        ],
        'fastfertig' => [['umbau-wohnhaus-fastfertig-fenster.webp', 'Fenster rein']],
    ],

    [
        'title'    => 'Malerarbeiten mit Holzböden',
        'label'    => 'Renovierung',
        'ergebnis' => [['maler-holzboden-ergebnis.webp', 'Frisch gestrichen, Dielen aufgearbeitet']],
        'vorher'   => [['maler-holzboden-vorher-abschleifen.webp', 'Vorher: Dielen werden abgeschliffen']],
    ],

    [
        'title'    => 'Fassadensanierung in Zusammenarbeit mit dem Denkmalamt',
        'label'    => 'Gebäudesanierung',
        'ergebnis' => [['denkmal-fassade-ergebnis.webp', 'Fachwerkfassade nach der Sanierung']],
        'vorher'   => [['denkmal-fassade-vorher.webp', 'Vorher']],
        'bau'      => [
            ['denkmal-fassade-bau-holzschutz.webp', 'Holzschutz mit Leinöl und Kalk-Kasein'],
            ['denkmal-fassade-bau-fugen.webp',      'Fugensanierung mit speziell angefertigten Mörteln aus Steinmehl, Rosshaar, Kalk und Lehm'],
        ],
    ],
    [
        'title'    => 'Komplettsanierung eines der ältesten Häuser in Tönning',
        'label'    => 'Gebäudesanierung',
        'ergebnis' => [
            ['toenning-ergebnis-1.webp',             'Eingangsbereich'],
            ['toenning-ergebnis-treppenhaus.webp',   'Treppenhaus'],
            ['toenning-ergebnis-2.webp',             'Veranda'],
            ['toenning-ergebnis-3.webp',             'Veranda'],
            ['toenning-ergebnis-bad.webp',           'Badezimmer'],
            ['toenning-ergebnis-wohnbereich-1.webp', 'Wohnbereich'],
            ['toenning-ergebnis-wohnbereich-2.webp', 'Wohnbereich'],
        ],
        'vorher'   => [
            ['toenning-vorher-1.webp',           'Vorher: Eingangsbereich'],
            ['toenning-vorher-treppenhaus.webp', 'Vorher: Treppenhaus'],
            ['toenning-vorher-2.webp',           'Vorher: Veranda von außen'],
            ['toenning-vorher-3.webp',           'Vorher: Veranda'],
            ['toenning-vorher-bad.webp',         'Vorher: Badezimmer'],
            ['toenning-vorher-wohnbereich.webp', 'Vorher: Wohnbereich'],
        ],
        'bau'      => [['toenning-bau-wohnbereich.webp', 'Wohnbereich während der Arbeiten']],
    ],
];
