<?php
$active = '';
$page_title = 'Arama';
require_once __DIR__ . '/includes/functions.php';

$q = trim($_GET['q'] ?? '');
$results = [];

if ($q !== '') {
    $ql = mb_strtolower($q, 'UTF-8');

    foreach (get_categories() as $cat) {
        if (mb_strpos(mb_strtolower($cat['name'], 'UTF-8'), $ql) !== false) {
            $results[] = ['title' => $cat['name'], 'url' => 'category.php?slug=' . rawurlencode($cat['slug']), 'type' => 'Kategori'];
        }
        foreach ($cat['variants'] as $v) {
            if (mb_strpos(mb_strtolower($v['name'], 'UTF-8'), $ql) !== false) {
                $results[] = ['title' => $v['name'] . ' — ' . $cat['name'], 'url' => 'product-detail.php?product=' . rawurlencode($v['slug']), 'type' => 'Ürün'];
            }
        }
    }

    // Statik sayfalar
    $pages = [
        ['Hakkımızda', 'about.php', ['hakkımızda', 'hakkimizda', 'about', 'polikon', 'kimiz']],
        ['İletişim', 'contact.php', ['iletişim', 'iletisim', 'contact', 'adres', 'telefon', 'e-posta', 'mail']],
        ['Haberler', 'news.php', ['haber', 'news', 'duyuru']],
        ['Ürünler', 'products.php', ['ürün', 'urun', 'product', 'bopp', 'film', 'iko']],
    ];
    $ql = mb_strtolower($q, 'UTF-8');
    foreach ($pages as [$title, $url, $keys]) {
        foreach ($keys as $k) {
            if (mb_strpos($ql, $k) !== false || mb_strpos(mb_strtolower($title, 'UTF-8'), $ql) !== false) {
                $results[] = ['title' => $title, 'url' => $url, 'type' => 'Sayfa'];
                break;
            }
        }
    }
}

require __DIR__ . '/partials/header.php';
?>

    <section class="page-header">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content">
                <h1 data-tr="Arama Sonuçları" data-en="Search Results">Arama Sonuçları</h1>
                <?php if ($q !== ''): ?>
                    <p class="page-header-subtitle">"<?= e($q) ?>" için <?= count($results) ?> sonuç</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <form action="search.php" method="get" style="max-width:560px; margin-bottom:40px; display:flex; gap:12px;">
                <input type="text" name="q" value="<?= e($q) ?>" placeholder="Arama yapın..." class="search-input" style="flex:1; padding:12px 16px; border:1px solid var(--light-gray); border-radius:6px;">
                <button type="submit" class="btn btn-primary">Ara</button>
            </form>

            <?php if ($q === ''): ?>
                <p style="color:var(--text-medium);">Aramak istediğiniz kelimeyi yukarıya yazın.</p>
            <?php elseif (!$results): ?>
                <p style="color:var(--text-medium);">"<?= e($q) ?>" için sonuç bulunamadı. Farklı bir kelime deneyin.</p>
            <?php else: ?>
                <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:12px; max-width:720px;">
                    <?php foreach ($results as $r): ?>
                        <li style="border:1px solid var(--light-gray); border-radius:8px; padding:16px 20px;">
                            <a href="<?= e($r['url']) ?>" style="font-weight:600; color:var(--text-dark);"><?= e($r['title']) ?></a>
                            <span style="float:right; font-size:12px; color:var(--text-medium); text-transform:uppercase; letter-spacing:1px;"><?= e($r['type']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </section>

<?php require __DIR__ . '/partials/footer.php'; ?>
