<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';

$page_title       = 'Datenschutzerklärung | TOS Handler';
$page_description = 'Datenschutzerklärung von TOS Handler e.K. Flensburg — Informationen zu Datenschutz, Cookies und Google Analytics nach DSGVO und TTDSG.';
$page_canonical   = '/datenschutz';
$body_class       = 'page-datenschutz';

require_once __DIR__ . '/includes/header.php';
?>

<main id="main-content">

  <div class="page-header">
    <div class="container">
      <p class="eyebrow">Rechtliches</p>
      <h1>Datenschutzerklärung</h1>
    </div>
  </div>

  <section class="section" aria-label="Datenschutzinhalt">
    <div class="container container--narrow">
      <div class="prose legal-prose">

        <h2>Allgemeiner Hinweis und Pflichtinformationen</h2>

        <h3>Benennung der verantwortlichen Stelle</h3>
        <p>
          Die verantwortliche Stelle für die Datenverarbeitung auf dieser Website ist:
        </p>
        <address>
          <?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?><br>
          <?php echo htmlspecialchars(CONTACT_STREET, ENT_QUOTES, 'UTF-8'); ?><br>
          <?php echo htmlspecialchars(CONTACT_ZIP . ' ' . CONTACT_CITY, ENT_QUOTES, 'UTF-8'); ?>
        </address>
        <p>
          Die verantwortliche Stelle entscheidet allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten (z. B. Namen, Kontaktdaten o. Ä.).
        </p>

        <h3>Widerruf Ihrer Einwilligung zur Datenverarbeitung</h3>
        <p>
          Nur mit Ihrer ausdrücklichen Einwilligung sind einige Vorgänge der Datenverarbeitung möglich. Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail. Die Rechtmäßigkeit der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unberührt.
        </p>

        <h3>Recht auf Beschwerde bei der zuständigen Aufsichtsbehörde</h3>
        <p>
          Als Betroffener steht Ihnen im Falle eines datenschutzrechtlichen Verstoßes ein Beschwerderecht bei der zuständigen Aufsichtsbehörde zu. Zuständige Aufsichtsbehörde bezüglich datenschutzrechtlicher Fragen ist der Landesdatenschutzbeauftragte des Bundeslandes, in dem sich der Sitz unseres Unternehmens befindet. Der folgende Link stellt eine Liste der Datenschutzbeauftragten sowie deren Kontaktdaten bereit: <a href="https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html" target="_blank" rel="noopener noreferrer">https://www.bfdi.bund.de</a>.
        </p>

        <h3>Recht auf Datenübertragbarkeit</h3>
        <p>
          Ihnen steht das Recht zu, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erfüllung eines Vertrags automatisiert verarbeiten, an sich oder an Dritte aushändigen zu lassen. Die Bereitstellung erfolgt in einem maschinenlesbaren Format. Sofern Sie die direkte Übertragung der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch machbar ist.
        </p>

        <h3>Recht auf Auskunft, Berichtigung, Sperrung, Löschung</h3>
        <p>
          Sie haben jederzeit im Rahmen der geltenden gesetzlichen Bestimmungen das Recht auf unentgeltliche Auskunft über Ihre gespeicherten personenbezogenen Daten, Herkunft der Daten, deren Empfänger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung, Sperrung oder Löschung dieser Daten. Diesbezüglich und auch zu weiteren Fragen zum Thema personenbezogene Daten können Sie sich jederzeit über die im Impressum aufgeführten Kontaktmöglichkeiten an uns wenden.
        </p>

        <h3>SSL- bzw. TLS-Verschlüsselung</h3>
        <p>
          Aus Sicherheitsgründen und zum Schutz der Übertragung vertraulicher Inhalte, die Sie an uns als Seitenbetreiber senden, nutzt unsere Website eine SSL-bzw. TLS-Verschlüsselung. Damit sind Daten, die Sie über diese Website übermitteln, für Dritte nicht mitlesbar. Sie erkennen eine verschlüsselte Verbindung an der „https://" Adresszeile Ihres Browsers und am Schloss-Symbol in der Browserzeile.
        </p>

        <h2>Server-Log-Dateien</h2>
        <p>
          In Server-Log-Dateien erhebt und speichert der Provider der Website automatisch Informationen, die Ihr Browser automatisch an uns übermittelt. Dies sind:
        </p>
        <ul>
          <li>Besuchte Seite auf unserer Domain</li>
          <li>Datum und Uhrzeit der Serveranfrage</li>
          <li>Browsertyp und Browserversion</li>
          <li>Verwendetes Betriebssystem</li>
          <li>Referrer URL</li>
          <li>Hostname des zugreifenden Rechners</li>
          <li>IP-Adresse</li>
        </ul>
        <p>
          Es findet keine Zusammenführung dieser Daten mit anderen Datenquellen statt. Grundlage der Datenverarbeitung bildet Art. 6 Abs. 1 lit. b DSGVO, der die Verarbeitung von Daten zur Erfüllung eines Vertrags oder vorvertraglicher Maßnahmen gestattet.
        </p>

        <h2>Kontaktformular</h2>
        <p>
          Per Kontaktformular übermittelte Daten werden einschließlich Ihrer Kontaktdaten gespeichert, um Ihre Anfrage bearbeiten zu können oder um für Anschlussfragen bereitzustehen. Eine Weitergabe dieser Daten findet ohne Ihre Einwilligung nicht statt.
        </p>
        <p>
          Die Verarbeitung der in das Kontaktformular eingegebenen Daten erfolgt ausschließlich auf Grundlage Ihrer Einwilligung (Art. 6 Abs. 1 lit. a DSGVO). Ein Widerruf Ihrer bereits erteilten Einwilligung ist jederzeit möglich. Für den Widerruf genügt eine formlose Mitteilung per E-Mail. Die Rechtmäßigkeit der bis zum Widerruf erfolgten Datenverarbeitungsvorgänge bleibt vom Widerruf unberührt.
        </p>
        <p>
          Über das Kontaktformular übermittelte Daten verbleiben bei uns, bis Sie uns zur Löschung auffordern, Ihre Einwilligung zur Speicherung widerrufen oder keine Notwendigkeit der Datenspeicherung mehr besteht. Zwingende gesetzliche Bestimmungen – insbesondere Aufbewahrungsfristen – bleiben unberührt.
        </p>

        <h2>Cookies</h2>
        <p>
          Unsere Website verwendet Cookies. Das sind kleine Textdateien, die Ihr Webbrowser auf Ihrem Endgerät speichert. Cookies helfen uns dabei, unser Angebot nutzerfreundlicher, effektiver und sicherer zu machen.
        </p>
        <p>
          Einige Cookies sind „Session-Cookies." Solche Cookies werden nach Ende Ihrer Browser-Sitzung von selbst gelöscht. Andere Cookies bleiben auf Ihrem Endgerät gespeichert bis Sie diese löschen. Solche Cookies helfen uns, Sie bei Rückkehr auf unserer Website wiederzuerkennen.
        </p>
        <p>
          Mit einem modernen Webbrowser können Sie das Setzen von Cookies überwachen, einschränken oder unterbinden. Viele Webbrowser lassen sich so konfigurieren, dass Cookies mit dem Schließen des Programms von selbst gelöscht werden. Die Deaktivierung von Cookies kann eine eingeschränkte Funktionalität unserer Website zur Folge haben.
        </p>
        <p>
          Das Setzen von Cookies, die zur Ausübung elektronischer Kommunikationsvorgänge oder der Bereitstellung bestimmter, von Ihnen erwünschter Funktionen notwendig sind, erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Als Betreiber dieser Website haben wir ein berechtigtes Interesse an der Speicherung von Cookies zur technisch fehlerfreien und reibungslosen Bereitstellung unserer Dienste. Sofern die Setzung anderer Cookies (z. B. für Analyse-Funktionen) erfolgt, werden diese in dieser Datenschutzerklärung separat behandelt.
        </p>

        <h2>Google Analytics</h2>
        <p>
          Diese Website nutzt Funktionen des Webanalysedienstes Google Analytics. Anbieter ist die Google Inc., 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA.
        </p>
        <p>
          <strong>Wichtig: Google Analytics wird auf dieser Website ausschließlich nach Ihrer ausdrücklichen Einwilligung über den Cookie-Banner geladen.</strong> Ohne Ihre Zustimmung werden keine Daten an Google übertragen.
        </p>
        <p>
          Google Analytics verwendet so genannte „Cookies". Das sind Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA übertragen und dort gespeichert.
        </p>
        <h3>IP Anonymisierung</h3>
        <p>
          Wir haben auf dieser Webseite die Funktion IP-Anonymisierung aktiviert. Dadurch wird Ihre IP-Adresse von Google innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum vor der Übermittlung in die USA gekürzt. Nur in Ausnahmefällen wird die volle IP-Adresse an einen Server von Google in den USA übertragen und dort gekürzt. Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegenüber dem Websitebetreiber zu erbringen. Die im Rahmen von Google Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengeführt.
        </p>
        <h3>Browser Plugin</h3>
        <p>
          Sie können die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer Browser-Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website vollumfänglich werden nutzen können. Sie können darüber hinaus die Erfassung der durch den Cookie erzeugten und auf Ihre Nutzung der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitung dieser Daten durch Google verhindern, indem Sie das unter dem folgenden Link verfügbare Browser-Plugin herunterladen und installieren: <a href="https://tools.google.com/dlpage/gaoptout?hl=de" target="_blank" rel="noopener noreferrer">https://tools.google.com/dlpage/gaoptout?hl=de</a>.
        </p>
        <h3>Widerspruch gegen Datenerfassung</h3>
        <p>
          Sie können die Erfassung Ihrer Daten durch Google Analytics verhindern, indem Sie auf folgenden Link klicken. Es wird ein Opt-Out-Cookie gesetzt, der die Erfassung Ihrer Daten bei zukünftigen Besuchen dieser Website verhindert:
          <button class="btn-inline" id="ga-optout">Google Analytics deaktivieren</button>.
        </p>
        <h3>Auftragsdatenverarbeitung</h3>
        <p>
          Wir haben mit Google einen Vertrag zur Auftragsdatenverarbeitung abgeschlossen und setzen die strengen Vorgaben der deutschen Datenschutzbehörden bei der Nutzung von Google Analytics vollständig um.
        </p>
        <h3>Demografische Merkmale bei Google Analytics</h3>
        <p>
          Diese Website nutzt die Funktion „demografische Merkmale" von Google Analytics. Dadurch können Berichte erstellt werden, die Aussagen zu Alter, Geschlecht und Interessen der Seitenbesucher enthalten. Diese Daten stammen aus interessenbezogener Werbung von Google sowie aus Besucherdaten von Drittanbietern. Diese Daten können keiner bestimmten Person zugeordnet werden. Sie können diese Funktion jederzeit über die Anzeigeneinstellungen in Ihrem Google-Konto deaktivieren oder die Erfassung Ihrer Daten durch Google Analytics wie im Punkt „Widerspruch gegen Datenerfassung" dargestellt generell untersagen.
        </p>

        <p class="legal-prose__source">Quelle: Datenschutz-Konfigurator von mein-datenschutzbeauftragter.de</p>

      </div>
    </div>
  </section>

</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
