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

<!-- Favicon -->
<link rel="icon" href="<?php echo htmlspecialchars(site_path('/favicon.ico'), ENT_QUOTES, 'UTF-8'); ?>" sizes="48x48">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo htmlspecialchars(asset_path('img/favicon-32.png'), ENT_QUOTES, 'UTF-8'); ?>">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo htmlspecialchars(asset_path('img/favicon-192.png'), ENT_QUOTES, 'UTF-8'); ?>">
<link rel="apple-touch-icon" href="<?php echo htmlspecialchars(asset_path('img/apple-touch-icon.png'), ENT_QUOTES, 'UTF-8'); ?>">
<meta name="theme-color" content="#faf8f4">

<!-- Vorschau beim Teilen (WhatsApp, Facebook, LinkedIn, iMessage, X) -->
<?php $og_image = SITE_URL . '/assets/img/og-image.jpg'; ?>
<meta property="og:type" content="website">
<meta property="og:locale" content="de_DE">
<meta property="og:site_name" content="<?php echo htmlspecialchars(SITE_NAME, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($page_title ?? SITE_NAME, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_description ?? '', ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="TOS Handler e.K., Fachbetrieb in Flensburg: Alles aus einer Hand.">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8'); ?>">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "@id": "https://tos-handler.de/#business",
  "name": "TOS Handler e.K.",
  "image": "https://tos-handler.de/assets/img/og-image.jpg",
  "logo": "https://tos-handler.de/assets/img/logo-tilman-handler.png",
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
