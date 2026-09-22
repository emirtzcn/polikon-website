<?php
/**
 * Paylaşılan site başlığı: <head>, navigasyon, arama katmanı.
 * Kullanım (sayfa başında):
 *   $page_title = 'Hakkımızda';
 *   $active = 'about';           // home|about|products|news|contact
 *   $extra_head = '<style>...</style>';   // opsiyonel
 *   require __DIR__ . '/partials/header.php';
 */
require_once __DIR__ . '/../includes/functions.php';

$page_title = $page_title ?? SITE_NAME;
$active     = $active ?? '';
$extra_head = $extra_head ?? '';
$meta_description = $meta_description ?? SITE_DESCRIPTION;
$og_image = $og_image ?? 'images/polikon_plastik_film_cover.png';
$canonical = SITE_URL . ($_SERVER['REQUEST_URI'] ?? '/');
$canonical = strtok($canonical, '?');   // sorgu parametrelerini canonical'dan çıkar
$nav_categories = get_categories();
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title) ?> — <?= e(SITE_NAME) ?></title>
    <meta name="description" content="<?= e($meta_description) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">

    <!-- Open Graph / sosyal paylaşım -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
    <meta property="og:title" content="<?= e($page_title) ?> — <?= e(SITE_NAME) ?>">
    <meta property="og:description" content="<?= e($meta_description) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e(SITE_URL . '/' . $og_image) ?>">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" href="images/transparan logo.png">
    <?php // Sürüm damgası: dosya değişince tarayıcı eski CSS'i kullanmasın
    $__v = function (string $p): string { $f = __DIR__ . '/../' . $p; return $p . '?v=' . (is_file($f) ? filemtime($f) : time()); }; ?>
    <link rel="stylesheet" href="<?= $__v('css/style.css') ?>">
    <link rel="stylesheet" href="<?= $__v('css/products.css') ?>">
    <link rel="stylesheet" href="<?= $__v('css/ported.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php // Poppins: site geneli tek font. Homemade Apple: yalnızca ana sayfa hero imza sloganı (SVG) için. ?>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Homemade+Apple&display=swap" rel="stylesheet">
    <?= $extra_head ?>
</head>
<body>
    <?php
    // Sayfa yükleme animasyonu: dönen BOPP film rulosu (spiral).
    // Spiral yolu burada üretilir (Arşimet spirali, 6 tur, iç yarıçap 16 → dış 54).
    $__sp = ''; $__cx = 70; $__cy = 70; $__turns = 6; $__rMin = 16; $__rMax = 54; $__tMax = $__turns * 2 * M_PI;
    for ($__t = 0; $__t <= $__tMax + 0.001; $__t += 0.12) {
        $__r = $__rMin + ($__rMax - $__rMin) * ($__t / $__tMax);
        $__x = round($__cx + $__r * cos($__t), 2); $__y = round($__cy + $__r * sin($__t), 2);
        $__sp .= ($__sp === '' ? 'M' : 'L') . $__x . ' ' . $__y . ' ';
    }
    ?>
    <div class="page-loader" id="pageLoader" role="status" aria-label="Yükleniyor">
        <div class="page-loader__inner">
            <svg class="loader-roll" viewBox="10 10 120 120" width="120" height="120" aria-hidden="true">
                <!-- Rulo (spiral sarım) — döner -->
                <g class="loader-roll__body">
                    <circle cx="70" cy="70" r="56" class="loader-roll__outer"/>
                    <path d="<?= trim($__sp) ?>" class="loader-roll__spiral"/>
                    <circle cx="70" cy="70" r="15" class="loader-roll__core"/>
                    <circle cx="70" cy="70" r="6" class="loader-roll__hole"/>
                    <line x1="70" y1="20" x2="70" y2="27" class="loader-roll__mark"/>
                </g>
            </svg>
            <img class="page-loader__logo" src="images/logo%20beyaz%20kirpik.png" alt="Polikon">
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/transparan logo.png" alt="Polikon" class="logo-img">
                    </a>
                </div>

                <div class="nav-menu" id="navMenu">
                    <ul class="nav-links">
                        <li><a href="index.php"<?= $active === 'home' ? ' class="active"' : '' ?> data-tr="Ana Sayfa" data-en="Home">Ana Sayfa</a></li>
                        <li class="dropdown">
                            <a href="products.php"<?= $active === 'products' ? ' class="active"' : '' ?> data-tr="Ürünler" data-en="Products">Ürünler
                                <svg class="dropdown-arrow" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($nav_categories as $cat): ?>
                                    <li><a href="category.php?slug=<?= e($cat['slug']) ?>"><?= e($cat['name']) ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a href="applications.php"<?= $active === 'applications' ? ' class="active"' : '' ?> data-tr="Uygulamalar" data-en="Applications">Uygulamalar</a></li>
                        <li><a href="news.php"<?= $active === 'news' ? ' class="active"' : '' ?> data-tr="Haberler" data-en="News">Haberler</a></li>
                        <li><a href="contact.php"<?= $active === 'contact' ? ' class="active"' : '' ?> data-tr="İletişim" data-en="Contact">İletişim</a></li>
                        <li><a href="about.php"<?= $active === 'about' ? ' class="active"' : '' ?> data-tr="Hakkımızda" data-en="About Us">Hakkımızda</a></li>
                    </ul>

                    <div class="nav-actions">
                        <div class="language-switcher">
                            <button class="lang-btn active" data-lang="tr">TR</button>
                            <span class="lang-divider">|</span>
                            <button class="lang-btn" data-lang="en">EN</button>
                        </div>
                        <button class="search-btn" aria-label="Search">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <div class="search-overlay-content">
            <div class="container">
                <button class="search-close" id="searchClose" aria-label="Close Search">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <form class="search-form" id="searchForm" action="search.php" method="GET">
                    <div class="search-input-wrapper">
                        <svg class="search-input-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        <input type="text" name="q" class="search-input" placeholder="Arama yapın..." data-tr-placeholder="Arama yapın..." data-en-placeholder="Search..." autocomplete="off">
                    </div>
                </form>
                <div class="search-quick-links">
                    <span class="quick-links-title" data-tr="Hızlı Erişim" data-en="Quick Links">Hızlı Erişim</span>
                    <div class="quick-links-grid">
                        <a href="products.php" data-tr="Ürünler" data-en="Products">Ürünler</a>
                        <a href="contact.php" data-tr="İletişim" data-en="Contact">İletişim</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
