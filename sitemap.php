<?php
/**
 * Dinamik sitemap.xml — ürünler değiştikçe otomatik güncellenir.
 * .htaccess ile /sitemap.xml adresine bağlanır.
 */
require_once __DIR__ . '/includes/functions.php';
header('Content-Type: application/xml; charset=utf-8');

$base = SITE_URL;
$urls = [
    ['loc' => $base . '/',             'pri' => '1.0'],
    ['loc' => $base . '/about.php',    'pri' => '0.7'],
    ['loc' => $base . '/products.php', 'pri' => '0.9'],
    ['loc' => $base . '/news.php',     'pri' => '0.6'],
    ['loc' => $base . '/contact.php',  'pri' => '0.7'],
];
foreach (get_categories() as $cat) {
    $urls[] = ['loc' => $base . '/category.php?slug=' . rawurlencode($cat['slug']), 'pri' => '0.8'];
    foreach ($cat['variants'] as $v) {
        $urls[] = ['loc' => $base . '/product-detail.php?product=' . rawurlencode($v['slug']), 'pri' => '0.6'];
    }
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $u) {
    echo "  <url>\n";
    echo '    <loc>' . e($u['loc']) . "</loc>\n";
    echo '    <priority>' . $u['pri'] . "</priority>\n";
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
