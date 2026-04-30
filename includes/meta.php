<?php
/**
 * meta.php — Schema.org JSON-LD LocalBusiness + seitenspezifische Meta-Tags
 * Wird im <head> eingebunden (vor dem schliessenden </head>).
 *
 * Erwartet:
 *   $page_title       string  — vollstaendiger <title>-Wert
 *   $page_description string  — Meta-Description (150–160 Zeichen)
 *   $page_canonical   string  — kanonische URL (relativ oder absolut)
 */

declare(strict_types=1);
require_once __DIR__ . '/config.php';

$canonical_url = SITE_URL . (isset($page_canonical) ? $page_canonical : '/');
?>
<title><?php echo htmlspecialchars($page_title ?? SITE_NAME, ENT_QUOTES, 'UTF-8'); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($page_description ?? '', ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "@id": "https://tos-handler.de/#business",
  "name": "TOS Handler e.K.",
  "image": "https://tos-handler.de/assets/img/2TOS-Brief-Typo.png",
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
</script>
