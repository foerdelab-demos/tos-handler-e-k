<?php
/**
 * leistungen.php — Inhalte der drei Leistungs-Popups (Hero → Zeile anklicken)
 *
 * - 'claim'  : Überschrift im Popup (leer = Bereichsname wird als Überschrift genutzt)
 * - 'text'   : optionaler Einleitungssatz unter der Überschrift
 * - 'items'  : Reihenfolge = Anzeige-Reihenfolge. Ein Eintrag ist entweder ein String
 *              oder [Bezeichnung, Details]. Details als String → kleine Zeile darunter,
 *              als Array → eingerückte Unterpunkte.
 * - 'marken' : optionale Markenlogos [[Bilddatei (unter assets/img/marken), Alt-Text, Link], …]
 */

declare(strict_types=1);

return [
    'gebaeudesanierung' => [
        'title' => 'Gebäudesanierung',
        'claim' => 'Beraten, Planen und Sanieren von:',
        'items' => [
            'Balkon & Dach',
            'Fassaden',
            'Beton',
            'Schimmel',
            'Brand- und Wasserschäden',
            'Bautrocknung',
            'Messtechnische Untersuchungen',
            ['Oberflächenreinigung mit Vakuumstrahlverfahren',
             'Graffiti · Fassade · Steinböden · Fliesen und Fugen · Holz im Innen- und Außenbereich · Entfernung von Bootslacken und Antifouling'],
            'Bauanträge und Statik',
        ],
    ],
    'gebaeudetechnik' => [
        'title' => 'Gebäudetechnik',
        'claim' => '',
        'text'  => 'Wärme, Wasser, Strom und Luft: effizient geplant und sauber installiert.',
        'items' => [
            ['Heizung & Sanitär', ['Fernwärme', 'Wärmepumpen', 'Badsanierung']],
            'Elektrotechnik',
            'Lüftung',
        ],
    ],
    'renovierung' => [
        'title' => 'Renovierung',
        'claim' => '',
        'text'  => 'Sauber und hochwertig ausgeführt.',
        'items' => [
            'Innenausbau',
            'Malerarbeiten',
            'Bodenbelagsarbeiten',
            'Fenster & Türen',
            'Einbauküchen von nobilia & Häcker',
        ],
        'marken' => [
            ['nobilia.png', 'nobilia',       'https://www.nobilia.de/de/'],
            ['haecker.svg', 'Häcker Küchen', 'https://www.haecker-kuechen.com/de/'],
        ],
    ],
];
