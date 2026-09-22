<?php
$active = 'news';
require_once __DIR__ . '/includes/functions.php';

$slug = $_GET['slug'] ?? '';
$item = get_news_by_slug($slug);
if (!$item) {
    http_response_code(404);
    $page_title = 'Haber bulunamadı';
    require __DIR__ . '/partials/header.php';
    echo '<section class="page-header" style="margin-top:102px;"><div class="page-header-overlay"></div><div class="container"><div class="page-header-content"><h1>Haber bulunamadı</h1></div></div></section>';
    echo '<section class="news-page-section"><div class="container"><p><a href="news.php" data-tr="Tüm haberlere dön" data-en="Back to all news">Tüm haberlere dön</a></p></div></section>';
    require __DIR__ . '/partials/footer.php';
    exit;
}

$page_title = $item['title']['tr'];
$meta_description = $item['excerpt']['tr'];
$og_image = $item['image'];

// Başlık görselinin en/boy oranı (fotoğrafın tamamını sığdırmak için)
$__d = @getimagesize(__DIR__ . '/' . $item['image']);
$header_ar = ($__d && !empty($__d[0]) && !empty($__d[1])) ? ($__d[0] . ' / ' . $__d[1]) : '16 / 7';

$extra_head = <<<HTML
<style>
    .nd-header {
        max-width: 1240px; width: calc(100% - 40px); margin: 102px auto 0;
        position: relative; overflow: hidden; border-radius: 8px;
        aspect-ratio: {$header_ar}; max-height: 460px;
        background: linear-gradient(to top, rgba(0,0,0,0.72) 0%, rgba(0,0,0,0.15) 55%, rgba(0,0,0,0.25) 100%), url('{$item['image']}') center / cover no-repeat #0e0f11;
        display: flex; align-items: flex-end;
    }
    .nd-header-content { position: relative; z-index: 1; padding: 40px; color: #fff; max-width: 900px; }
    .nd-meta { display: flex; align-items: center; gap: 14px; margin-bottom: 14px; flex-wrap: wrap; }
    .nd-cat {
        background: var(--ab-orange, #f7941e); color: #fff; font-size: 12px; font-weight: 700;
        letter-spacing: 0.5px; text-transform: uppercase; padding: 5px 12px; border-radius: 4px;
    }
    .nd-date { color: rgba(255,255,255,0.85); font-size: 14px; }
    .nd-title { font-family: var(--font-display); font-size: 40px; font-weight: 800; line-height: 1.15; margin: 0; }

    .nd-article { padding: 56px 0 90px; }
    .nd-body { max-width: 820px; margin: 0 auto; }
    .nd-body p { font-size: 17px; line-height: 1.85; color: var(--text-medium); margin: 0 0 22px; }
    .nd-back { margin-top: 36px; }

    @media (max-width: 780px) {
        .nd-header { aspect-ratio: 3 / 2; }
        .nd-header-content { padding: 24px; }
        .nd-title { font-size: 28px; }
        .nd-article { padding: 40px 0 60px; }
    }
</style>
HTML;

require __DIR__ . '/partials/header.php';
?>

    <!-- Haber Başlık (kapak) -->
    <section class="nd-header">
        <div class="nd-header-content">
            <div class="nd-meta">
                <span class="nd-date" data-tr="<?= e($item['date']['tr']) ?>" data-en="<?= e($item['date']['en']) ?>"><?= e($item['date']['tr']) ?></span>
            </div>
            <h1 class="nd-title" data-tr="<?= e($item['title']['tr']) ?>" data-en="<?= e($item['title']['en']) ?>"><?= e($item['title']['tr']) ?></h1>
        </div>
    </section>

    <!-- Haber İçeriği -->
    <section class="nd-article">
        <div class="container">
            <div class="nd-body">
                <?php foreach ($item['body'] as $p): ?>
                    <p data-tr="<?= e($p['tr']) ?>" data-en="<?= e($p['en']) ?>"><?= e($p['tr']) ?></p>
                <?php endforeach; ?>

                <?php if (!empty($item['source_url'])): ?>
                    <div class="nd-source" style="margin-top:36px;">
                        <a href="<?= e($item['source_url']) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                            <span data-tr="Habere Git" data-en="Go to Article">Habere Git</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:6px;"><path d="M7 17 17 7"></path><polyline points="7 7 17 7 17 17"></polyline></svg>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="nd-back" style="margin-top:24px;">
                    <a href="news.php" class="btn btn-outline" data-tr="Tüm Haberlere Dön" data-en="Back to All News">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"></path><polyline points="12 19 5 12 12 5"></polyline></svg>
                        Tüm Haberlere Dön
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php require __DIR__ . '/partials/footer.php'; ?>
