<?php
/**
 * bewertungen.php — Google-Bewertungen (statisch gepflegt, Wortlaut wie auf Google)
 *
 * - Leistungen im Text mit [[Doppelklammern]] markieren → werden rot hervorgehoben.
 * - 'leistungen' = Chips unter der Rezension (optional, leeres Array = keine Chips).
 * - 'aktiv' => false blendet eine Rezension aus, ohne sie zu löschen.
 * - 'summary': 'score' (z. B. '5,0') und 'count' von Google übernehmen; leer/0 = wird nicht angezeigt.
 */

declare(strict_types=1);

return [
    'summary' => [
        'score' => '',   // TODO: Gesamtbewertung von Google eintragen, z. B. '5,0'
        'count' => 0,    // TODO: Anzahl der Google-Rezensionen, z. B. 14
        'url'   => 'https://www.google.com/maps/place/TOS+Handler+e.K./',
    ],
    'reviews' => [
        [
            'author'     => 'Wolf Borchers',
            'stars'      => 5,
            'date'       => 'vor 4 Monaten',
            'text'       => 'Herr Handler hat uns mehrere Wohnungen [[komplett saniert]]. Wir sind froh, dass es solche Alleskönner noch gibt. Sehr gute Herangehensweise, die sich auf das Notwendige konzentriert und somit die Kosten im Rahmen hält. Hochwertige Ausführung und absolut zuverlässig. Auch persönlich sehr angenehmer und offener Umgang.',
            'leistungen' => ['Wohnungssanierung', 'Kostenbewusst'],
        ],
        [
            'author'     => 'Iryna Schmidt',
            'stars'      => 5,
            'date'       => 'vor 1 Jahr',
            'text'       => 'Wir sind glücklich den Herrn Handler und sein Team für die [[Sanierung unserer beider Bäder]] engagiert zu haben. Ab dem ersten Kontakt liefen alle Absprachen absolut konstruktiv und zuverlässig. Herr Handler hat eine große Erfahrung und kann zu allen [[Sanierung/Renovierung]] Themen prima beraten. Er hat viele praktische und ästhetische Ideen und unterstützt gerne bei individuellen Lösungen. Das Handwerkerteam hat auch perfekte Arbeit geleistet. Die Arbeiter waren stets zuverlässig, kompetent und freundlich. Wir sind rundum zufrieden mit dem Ergebnis und können die Firma vom Herrn Handler uneingeschränkt weiter empfehlen.',
            'leistungen' => ['Badsanierung', 'Beratung'],
        ],
        [
            'author'     => 'Martin Asmussen',
            'stars'      => 5,
            'date'       => 'vor 4 Jahren',
            'text'       => 'Herr Handler und sein Team haben eine komplette [[Kernsanierung]] (alle Gewerke) durchgeführt. Neue [[Decken, Wände, Böden, Bad, Elektrik]] ... Bis zur Schlüsselübergabe einschließlich dem Aufbau der Möbel. Herr Handler ist sehr erfahren und 100% zuverlässig. Wir wohnen 300km entfernt. Alle Absprachen erfolgten telefonisch. Probleme kennt Herr Handler nicht, er und sein Team finden immer eine Lösung. Zu 100% zu. Empfehlen 👍👍',
            'leistungen' => ['Kernsanierung', 'Alle Gewerke', 'Elektrik'],
        ],
        [
            'author'     => 'Lena Thomsen',
            'stars'      => 5,
            'date'       => 'vor 1 Jahr',
            'text'       => '5* Service - super Qualität und Kompetenz. Trotz unerwartet umfangreicherer Schäden verlief die [[Reparatur]] zügig und reibungslos. Herr Handler unterstützte mich zudem bei der Kommunikation mit meiner [[Versicherung]], was den Prozess erheblich erleichterte. Sein Team arbeitete nicht nur professionell, sondern war auch äußerst höflich. Sehr empfehlenswert!',
            'leistungen' => ['Schadensanierung', 'Versicherungsabwicklung'],
        ],
        [
            'author'     => 'Anne P.',
            'stars'      => 5,
            'date'       => 'vor 1 Jahr',
            'text'       => 'Ich bin mehr als zufrieden mit der Arbeit von TOS Tilman Handler e.K. – alles wurde schnell, sauber und äußerst professionell erledigt. Der Chef ist sehr freundlich und engagiert, ebenso wie das ganze Team, das kompetent und zuverlässig arbeitet. Man fühlt sich gut aufgehoben und ernst genommen. Ich kann die Firma uneingeschränkt weiterempfehlen!',
            'leistungen' => [],
        ],
        [
            'author'     => 'Katharina Dittmer',
            'stars'      => 5,
            'date'       => 'vor 2 Jahren',
            'text'       => 'Ich bin sehr zufrieden mit der Firma TOS Handler. Er hat vor 3 Jahren in meinem Haus einige [[Renovierungen]] gemacht. Es war alles zu meiner Zufriedenheit. Auch wenn mann mal Hilfe oder einen Rat braucht nimmt er sich Zeit und Hilft einem mit Rat und Tat. Ich werde ihn immer wieder anfragen wenn etwas an meinem Haus gemacht werden muss.',
            'leistungen' => ['Renovierung', 'Beratung'],
        ],
        [
            // Enthält den Satz zu Sprachkenntnissen der Mitarbeiter — bitte mit dem Kunden
            // abstimmen, ob diese Rezension auf die Seite soll. 'aktiv' => true schaltet sie frei.
            'author'     => 'Ulrike Hermes',
            'stars'      => 5,
            'date'       => 'vor 4 Jahren',
            'aktiv'      => false,
            'text'       => 'Bereits zum zweiten Mal haben wir die Firma TOS Handler mit der [[Renovierung unserer Wohnung]] beauftragt. Wir wohnen ca. 800 km von der Wohnung entfernt, daher lief der Kontakt überwiegend mittels Telefon. Herr Handler war für uns stets erreichbar und überaus zuverlässig. Alle Absprachen wurden eingehalten. Auf unsere Ideen und Wünsche ist Herr Handler eingegangen und gab uns viele wertvolle Tipps. Im Vergleich zu anderen Handwerkern gab es den Spruch „Oh, das ist ein Problem!“ bei Herrn Handler nie. Er fand immer eine Lösung. Auch wenn die Kommunikation mit dem ein oder anderen Mitarbeiter aufgrund der fehlenden Sprachkenntnisse manchmal etwas schwierig war, gab es letztlich keinerlei Probleme. Im Gegenteil, die Mitarbeiter waren ausgesprochen nett und hilfsbereit. Wir können die Firma TOS Handler ohne Bedenken weiterempfehlen.',
            'leistungen' => ['Wohnungsrenovierung'],
        ],
    ],
];
