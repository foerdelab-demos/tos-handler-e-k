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
 * 'slides' (optional) legt eine eigene Reihenfolge fest und ersetzt die Töpfe:
 *   [['ergebnis'|'vorher'|'bau'|'fastfertig', 'datei.webp', 'Bildunterschrift'], …]
 * 'text' (optional) ist ein kurzer Absatz unter dem Titel.
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
            ['umbau-wohnhaus-bau-dachstuhl.webp', 'Dachstuhl'],
            ['umbau-wohnhaus-bau-giebel.webp',    'Giebel neu aufgemauert'],
            ['umbau-wohnhaus-bau-geruest.webp',   'Eingerüstet, Umbau läuft'],
        ],
        'fastfertig' => [['umbau-wohnhaus-fastfertig-fenster.webp', 'Fenster rein']],
    ],

    [
        'title'    => 'Malerarbeiten und Holzböden aufarbeiten',
        'label'    => 'Renovierung',
        // eigene Reihenfolge: Ergebnis nur einmal (Kundenwunsch)
        'slides'   => [
            ['ergebnis', 'maler-holzboden-ergebnis.webp',           'Frisch gestrichen, Dielen aufgearbeitet'],
            ['vorher',   'maler-holzboden-vorher-abschleifen.webp', 'Vorher: Dielen werden abgeschliffen'],
        ],
    ],

    [
        'title'    => 'Fassadensanierung in Zusammenarbeit mit dem Denkmalamt',
        'label'    => 'Gebäudesanierung',
        // Bildtexte nach Kundenvorgabe vom 20.11.2026
        'slides'   => [
            ['ergebnis', 'denkmal-fassade-ergebnis.webp',       'Fachwerkfassade nach der Sanierung'],
            ['vorher',   'denkmal-fassade-vorher.webp',         'Sämtliches Holz und Balken erneuert'],
            ['bau',      'denkmal-fassade-bau-holzschutz.webp', 'Holzschutz mit Leinöl und Kalk-Kasein'],
            ['bau',      'denkmal-fassade-bau-fugen.webp',      'Holzschutz mit Leinöl und Kalk-Kasein'],
            ['ergebnis', 'denkmal-fassade-ergebnis.webp',       'Fugensanierung mit speziell angefertigten Mörteln aus Steinmehl, Rosshaar, Kalk und Lehm'],
        ],
    ],
    [
        'title'    => 'Komplettsanierung eines der ältesten Häuser in Tönning',
        'label'    => 'Gebäudesanierung',
        // Vorher-Nachher-Paare je Raum (Kundenwunsch)
        'slides'   => [
            ['ergebnis', 'toenning-ergebnis-treppenhaus.webp',   'Treppenhaus'],
            ['vorher',   'toenning-vorher-treppenhaus-2.webp',   'Vorher: Treppenhaus'],
            ['vorher',   'toenning-vorher-treppenhaus.webp',     'Vorher: Flur'],
            ['ergebnis', 'toenning-ergebnis-1.webp',             'Eingangsbereich'],
            ['vorher',   'toenning-vorher-1.webp',               'Vorher: Eingangsbereich'],
            ['vorher',   'toenning-vorher-2.webp',               'Vorher: Veranda von außen'],
            ['vorher',   'toenning-vorher-3.webp',               'Vorher: Veranda'],
            ['ergebnis', 'toenning-ergebnis-2.webp',             'Veranda'],
            ['ergebnis', 'toenning-ergebnis-3.webp',             'Veranda'],
            ['vorher',   'toenning-vorher-bad.webp',             'Vorher: Gäste-WC'],
            ['ergebnis', 'toenning-ergebnis-bad.webp',           'Gäste-WC'],
            ['vorher',   'toenning-vorher-wohnbereich.webp',     'Vorher: Wohnbereich'],
            ['bau',      'toenning-bau-wohnbereich.webp',        'Wohnbereich während der Arbeiten'],
            ['ergebnis', 'toenning-ergebnis-wohnbereich-1.webp', 'Wohnbereich'],
            ['ergebnis', 'toenning-ergebnis-wohnbereich-2.webp', 'Wohnbereich'],
        ],
    ],
    [
        'title'    => 'Fassaden- und Balkonsanierung',
        'label'    => 'Gebäudesanierung',
        // eigene Reihenfolge: eingerüstete Fassade an zweiter Stelle (Kundenwunsch)
        'slides'   => [
            ['ergebnis', 'balkonsanierung-ergebnis.webp', 'Fassade und Balkone nach der Sanierung'],
            ['bau',      'balkonsanierung-bau-3.webp',    'Eingerüstete Fassade'],
            ['vorher',   'balkonsanierung-vorher-1.webp', 'Vorher: Schaden am Fenstersturz'],
            ['bau',      'balkonsanierung-vorher-2.webp', 'Ein defekter Sturz wurde erneuert'],
            ['bau',      'balkonsanierung-bau-1.webp',    'Während der Sanierung'],
            ['bau',      'balkonsanierung-bau-2.webp',    'Während der Sanierung'],
            ['ergebnis', 'balkonsanierung-ergebnis.webp', 'Fassade und Balkone nach der Sanierung'],
        ],
    ],
    [
        'title'    => 'Badsanierungen',
        'label'    => 'Gebäudetechnik',
        'ergebnis' => ['bad-a-1.webp', 'bad-a-4.webp', 'bad-a-2.webp', 'bad-a-3.webp'],
    ],
    [
        'title'    => 'Weitere Badsanierungen mit Vorher und Nachher',
        'label'    => 'Gebäudetechnik',
        'ergebnis' => ['bad-b-6.webp', 'bad-b-7.webp', 'bad-b-8.webp', 'bad-b-5.webp',
                       'bad-b-4.webp', 'bad-b-1.webp', 'bad-b-3.webp', 'bad-b-2.webp'],
        'vorher'   => [['bad-b-vorher.webp', 'Vorher']],
    ],
    [
        'title'    => 'Komplettsanierung einer Zweizimmerwohnung',
        'label'    => 'Renovierung',
        'ergebnis' => [
            ['zweizimmer-kueche.webp',       'Küche'],
            ['zweizimmer-schlafzimmer.webp', 'Schlafzimmer'],
            ['zweizimmer-bad.webp',          'Bad'],
        ],
    ],
    [
        'title'    => 'Komplettsanierung einer Wohnung',
        'label'    => 'Renovierung',
        // Ergebnis und passendes Vorher-Bild im Wechsel, bewusst ohne Bildunterschriften
        'slides'   => [
            ['ergebnis', 'wohnung-ergebnis-kueche.webp',        ''],
            ['vorher',   'wohnung-vorher-kueche.webp',          ''],
            ['ergebnis', 'wohnung-ergebnis-wohnbereich.webp',   ''],
            ['vorher',   'wohnung-vorher-wohnbereich-1.webp',   ''],
            ['vorher',   'wohnung-vorher-wohnbereich-2.webp',   ''],
            ['ergebnis', 'wohnung-ergebnis-bad-klein.webp',     ''],
            ['vorher',   'wohnung-vorher-bad.webp',             ''],
            ['ergebnis', 'wohnung-ergebnis-bad-1.webp',         ''],
            ['ergebnis', 'wohnung-ergebnis-bad-2.webp',         ''],
        ],
    ],
    [
        'title'    => 'Einer von mehreren Sanitärumbauten in der dänischen Zentralbibliothek',
        'label'    => 'Gebäudetechnik',
        'ergebnis' => ['bibliothek-sanitaer-ergebnis-1.webp', 'bibliothek-sanitaer-ergebnis-2.webp',
                       'bibliothek-sanitaer-ergebnis-3.webp', 'bibliothek-sanitaer-ergebnis-urinal.webp'],
        'vorher'   => ['bibliothek-sanitaer-vorher-1.webp', 'bibliothek-sanitaer-vorher-2.webp'],
        'bau'      => ['bibliothek-sanitaer-bau-1.webp', 'bibliothek-sanitaer-bau-2.webp', 'bibliothek-sanitaer-bau-3.webp'],
    ],
    [
        'title'    => 'Umbau von Lagerräumen zu Besucherräumen der dänischen Bibliothek in Schleswig',
        'label'    => 'Renovierung',
        'ergebnis' => ['bibliothek-schleswig-panorama.webp', 'bibliothek-schleswig-1.webp',
                       'bibliothek-schleswig-2.webp', 'bibliothek-schleswig-3.webp'],
    ],
    [
        'title'    => 'Umbau auf Fernwärme',
        'label'    => 'Gebäudetechnik',
        'text'     => 'Über Jahre wurde viel Geld in Reparaturen dieser Anlage investiert, ohne dass sie dauerhaft störungsfrei lief. Nach einem Verwalterwechsel sollten wir die Ursache finden. Wir haben die Anlage, die ursprünglich mit einer Ölheizung arbeitete, auf den seit Jahren bestehenden Fernwärmeanschluss umgebaut. Seit vier Jahren läuft sie störungsfrei und spart erheblich Energie.',
        'ergebnis' => ['fernwaerme-ergebnis-1.webp', 'fernwaerme-ergebnis-2.webp'],
        'vorher'   => [['fernwaerme-vorher.webp', 'Vorher']],
    ],
    [
        'title'    => 'Giebelsanierung',
        'label'    => 'Gebäudesanierung',
        'ergebnis' => ['giebelsanierung-ergebnis.webp'],
        'bau'      => ['giebelsanierung-bau.webp'],
    ],
    [
        'title'    => 'Schadhaftes Verblendmauerwerk wurde verputzt',
        'label'    => 'Gebäudesanierung',
        'ergebnis' => ['verblendmauerwerk-ergebnis.webp'],
        'bau'      => ['verblendmauerwerk-bau.webp'],
    ],
    [
        'title'    => 'Ausführung eines Anbaus mit Terrasse',
        'label'    => 'Gebäudesanierung',
        'ergebnis' => ['anbau-terrasse-ergebnis.webp'],
    ],
    [
        'title'    => 'Innenausbau',
        'label'    => 'Renovierung',
        'bau'      => ['innenausbau-dach-1.webp', 'innenausbau-dach-2.webp', 'innenausbau-dach-3.webp'],
    ],
    [
        'title'    => 'Betonsanierung',
        'label'    => 'Gebäudesanierung',
        'bau'      => ['betonsanierung-bau.webp'],
    ],
    [
        'title'    => 'Mit der Wärmebildkamera Wärmebrücken sichtbar machen',
        'label'    => 'Gebäudesanierung',
        'ergebnis' => ['waermebild-1.webp', 'waermebild-2.webp'],
    ],
    [
        'title'    => 'Weitere Ausschnitte von Baustellen',
        'ergebnis' => [
            ['baustelle-fussbodenheizung.webp', 'Fußbodenheizung'],
            ['baustelle-hubbuehne.webp',        'Arbeiten mit der Hubarbeitsbühne'],
            ['baustelle-trocknung.webp',        'Bautrocknung'],
            ['baustelle-fahrzeug.webp',         'Unterwegs zur Baustelle'],
        ],
    ],
    [
        'title'    => 'Spaß bei der Arbeit!',
        'ergebnis' => ['team-1.webp', 'team-2.webp'],
    ],
];
