<?php
$page_title = "Haberler";
$active = "news";
$meta_description = "Polikon haberler — üretim kilometre taşları, yeni ürünler ve şirket güncellemeleri.";
require_once __DIR__ . '/includes/functions.php';
$news = get_news();

// News başlık görseli (kaynak: factory extrusion), yoksa yedek
$news_hero = 'images/factory/factory-8.jpeg';
if (!is_file(__DIR__ . '/' . $news_hero)) { $news_hero = 'images/factory/bopp-line-overview.jpeg'; }

$extra_head = <<<'HTML'
<style>
    /* Haberler başlığı: kenardan kenara, hafif karartma */
    .page-header { max-width: none; width: 100%; margin: 102px 0 0; }
    /* Haberler kart ızgarası (kaynak News.jsx teması) — nw-* ile izole */
    .nw-section { padding: 80px 0 100px; }
    .nw-grid { display: grid; grid-template-columns: minmax(0, 680px); justify-content: center; gap: 40px 32px; }
    @media (min-width: 900px) {
        .nw-grid.nw-multi { grid-template-columns: repeat(2, minmax(0, 1fr)); max-width: 1080px; margin: 0 auto; justify-content: stretch; }
    }
    .nw-card {
        display: flex; flex-direction: column;
        border: 1px solid var(--light-gray); border-radius: 10px; overflow: hidden;
        background: #fff; color: inherit; text-decoration: none;
        transition: box-shadow .2s ease, transform .2s ease;
    }
    .nw-card:hover { box-shadow: var(--shadow-md, 0 12px 30px rgba(0,0,0,0.12)); transform: translateY(-3px); }
    .nw-media { aspect-ratio: 16 / 9; overflow: hidden; background: var(--light-bg); }
    .nw-media img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .5s ease; }
    .nw-card:hover .nw-media img { transform: scale(1.04); }
    .nw-body { padding: 28px; }
    .nw-meta { display: flex; align-items: center; gap: 12px; font-size: 13px; color: var(--text-medium); margin-bottom: 12px; }
    .nw-cat { color: #f7941e; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; }
    .nw-body h3 { font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--text-dark); margin: 0 0 10px; line-height: 1.3; }
    .nw-body p { color: var(--text-medium); font-size: 15px; line-height: 1.6; margin: 0; }
    .nw-readmore { display: inline-flex; align-items: center; gap: 8px; margin-top: 16px; color: #f7941e; font-weight: 600; font-size: 14px; transition: gap .2s ease; }
    .nw-card:hover .nw-readmore { gap: 12px; }
    .nw-eyebrow { display: inline-block; color: #f7941e; font-size: 13px; font-weight: 700; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 12px; }
    @media (max-width: 600px) { .nw-body { padding: 22px; } }
</style>
HTML;

require __DIR__ . '/partials/header.php';
?>

    <!-- Page Header -->
    <section class="page-header" style="background: url('<?= e($news_hero) ?>') center / cover no-repeat #0e0f11;">
        <div class="page-header-overlay" style="background: rgba(0,0,0,0.25);"></div>
        <div class="container">
            <div class="page-header-content">
                <span class="nw-eyebrow" data-tr="Haberler ve Gelişmeler" data-en="News &amp; Updates">Haberler ve Gelişmeler</span>
                <h1 data-tr="POLIKON'da neler oluyor." data-en="What's happening at POLIKON.">POLIKON'da neler oluyor.</h1>
                <p class="page-header-subtitle" data-tr="Ekibimizden üretim kilometre taşları, yeni ürünler ve şirket güncellemeleri." data-en="Production milestones, new products and company updates from our team.">Ekibimizden üretim kilometre taşları, yeni ürünler ve şirket güncellemeleri.</p>
            </div>
        </div>
    </section>

    <!-- Haberler -->
    <section class="nw-section">
        <div class="container">
            <div class="nw-grid<?= count($news) > 1 ? ' nw-multi' : '' ?>">
                <?php foreach ($news as $n):
                    $ext    = !empty($n['url']);
                    $href   = $ext ? $n['url'] : ('news-detail.php?slug=' . rawurlencode($n['slug']));
                    $target = $ext ? ' target="_blank" rel="noopener noreferrer"' : '';
                    $source = $n['source'] ?? '';
                ?>
                    <a class="nw-card" href="<?= e($href) ?>"<?= $target ?> aria-label="<?= e($n['title']['tr']) ?>">
                        <div class="nw-media">
                            <img src="<?= e($n['image']) ?>" alt="<?= e($n['title']['tr']) ?>" loading="lazy">
                        </div>
                        <div class="nw-body">
                            <h3 data-tr="<?= e($n['title']['tr']) ?>" data-en="<?= e($n['title']['en']) ?>"><?= e($n['title']['tr']) ?></h3>
                            <p data-tr="<?= e($n['excerpt']['tr']) ?>" data-en="<?= e($n['excerpt']['en']) ?>"><?= e($n['excerpt']['tr']) ?></p>
                            <span class="nw-readmore"><span data-tr="Devamını oku" data-en="Read more">Devamını oku</span> <span class="arrow">&rarr;</span></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php require __DIR__ . '/partials/footer.php'; ?>
