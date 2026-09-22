<?php
/**
 * Ortak yardımcılar — içerik statik PHP dizisinden gelir (veritabanı yok).
 */
require_once __DIR__ . '/../config.php';

/** HTML kaçış (XSS). */
function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

/** İki dilli görünür metin için data-tr/data-en özniteliklerini üretir. */
if (!function_exists('tt')) {
    function tt(string $tr, string $en): string
    {
        return 'data-tr="' . e($tr) . '" data-en="' . e($en) . '"';
    }
}

/** Yol segmentlerini koruyarak URL kodlar (boşluklar %20 olur). */
if (!function_exists('pk_enc')) {
    function pk_enc(string $path): string
    {
        return implode('/', array_map('rawurlencode', explode('/', $path)));
    }
}

function slugify(string $text): string
{
    $tr = ['ç','ğ','ı','İ','ö','ş','ü','Ç','Ğ','Ö','Ş','Ü'];
    $en = ['c','g','i','i','o','s','u','c','g','o','s','u'];
    $text = str_replace($tr, $en, $text);
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
}

/* -------------------- Ürün verisi (statik) -------------------- */

/** Tüm kategoriler (variants dahil). */
function all_categories(): array
{
    static $data = null;
    if ($data === null) {
        $data = require __DIR__ . '/products.php';
    }
    return $data;
}

/** Kategori listesi (nav/products için). */
function get_categories(): array
{
    return all_categories();
}

function get_category_by_slug(string $slug): ?array
{
    foreach (all_categories() as $cat) {
        if ($cat['slug'] === $slug) {
            return $cat;
        }
    }
    return null;
}

/** Bir varyantı slug ile bul; kategori bilgisiyle döner. */
function get_variant_by_slug(string $slug): ?array
{
    foreach (all_categories() as $cat) {
        foreach ($cat['variants'] as $v) {
            if ($v['slug'] === $slug) {
                $v['category_name'] = $cat['name'];
                $v['category_slug'] = $cat['slug'];
                return $v;
            }
        }
    }
    return null;
}

/** Tüm haberler (statik veri). */
function all_news(): array
{
    static $data = null;
    if ($data === null) {
        $data = require __DIR__ . '/news.php';
    }
    return $data;
}

/** Haber listesi (haberler sayfası / ana sayfa). */
function get_news(): array
{
    return all_news();
}

/** Bir haberi slug ile bul. */
function get_news_by_slug(string $slug): ?array
{
    foreach (all_news() as $n) {
        if ($n['slug'] === $slug) {
            return $n;
        }
    }
    return null;
}

/** Görselin genel yolu; yoksa placeholder. */
function product_image_url(?string $image, string $fallback = 'images/1.jpg'): string
{
    if ($image && is_file(__DIR__ . '/../' . $image)) {
        return $image;
    }
    return $fallback;
}
