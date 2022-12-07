<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('ui')->group(function() {
    Route::get('/', function () {
        return view('ui.pages.homepage-mk-bandung');
    });

    Route::get('/article', function () {
        return view('ui.pages.article-paging-mk-bandung');
    });

    Route::get('/index-tag-paging', function () {
        return view('ui.pages.index-tag-paging-mk-bandung');
    });

    Route::get('/index-paging', function () {
        return view('ui.pages.index-paging-mk-bandung');
    });

    Route::get('/not-found', function () {
        return view('ui.pages.not-found-mk-bandung');
    });
});

//GROUP BY SITE
Route::group(['namespace'=> config('site.namespace')], function()
{
    //sitemap
    Route::controller(SiteMapController::class)->group(function () {

        Route::get('/manifest.json', 'manifest')->middleware('cacheResponse:900');

        Route::get('/robots.txt', 'robots')->middleware('cacheResponse:900');

        Route::get('/ads.txt', 'ads')->middleware('cacheResponse:900');

        Route::get('/sitemap.xml', 'index')->middleware('cacheResponse:900');

        Route::get('/sitemap_web.xml', 'index')->middleware('cacheResponse:900');

        Route::get('/sitemap_news.xml', 'news')->middleware('cacheResponse:900');

        Route::get('sitemap_image.xml', 'photo')->middleware('cacheResponse:900');

        Route::get('sitemap_video.xml', 'video')->middleware('cacheResponse:900');

        Route::get('/sitemap_tag.xml', 'tag')->middleware('cacheResponse:900');

        Route::get('/{category}/sitemap_{type}.xml', 'category')->whereIn('type', ['web', 'news', 'image', 'video'])->middleware('cacheResponse:900');
    });

    //Post
    Route::controller(PostController::class)->group(function () {

        Route::middleware('WebHook')->match(['GET','POST'],'/report', 'index');

        Route::middleware('WebHook')->match(['GET'],'/kontak-kami', 'contact_us');
    });

    // Photo
    Route::controller(PhotoController::class)->group(function () {
        Route::get('/photo', 'photo')->middleware('cacheResponse:900');
    });

    // Video
    Route::controller(VideoController::class)->group(function () {
        Route::get('/video', 'video')->middleware('cacheResponse:900');
    });

    // Tag News
    Route::controller(TagController::class)->group(function () {
        Route::get('/tag/{category?}/{page?}', 'tag')->middleware('cacheResponse:900')->where('page', '^page\-([0-9]+)');
    });

   // Index Berita
    Route::controller(IndexBeritaController::class)->name('indexberita.')->group(function () {
        Route::get('/index-berita/{page?}', 'indexBerita')->middleware('cacheResponse:900')->name('index-berita');
    });

    // static
    Route::controller(StaticController::class)->group(function () {
        Route::get('/info/{slug}', 'static')->middleware('cacheResponse:10800');
    });

    // Detail News & Detail AMP
    Route::controller(DetailNewsController::class)->group(function () {
        Route::get('amp/{category}/read/{id}/{slug?}/{page?}', 'detailAmp')->middleware(['cacheResponse:54000', 'cache.headers', 'desired.slug', 'varnish.ttl:30'])->where('page', '^page\-([0-9]+)');

        Route::get('/{category}/read/{id}/{slug?}/{page?}/{debug?}', 'detail')->middleware(['cacheResponse:54000', 'cache.headers', 'desired.slug', 'varnish.ttl:30'])->where('page', '^page\-([0-9]+)');
    });

    // Category News
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/{category}/{page?}', 'category')->middleware(['cacheResponse:900', 'desired.slug'])->where('page', '^page\-([0-9]+)');
        Route::get('/{category}/{subCategory1}/{page?}', 'category')->middleware(['cacheResponse:900', 'desired.slug'])->where('page', '^page\-([0-9]+)');
        Route::get('/{category}/{subCategory1}/{subCategory2}/{page?}', 'category')->middleware(['cacheResponse:900', 'desired.slug'])->where('page', '^page\-([0-9]+)');
    });

    // Author
    Route::controller(AuthorControler::class)->group(function () {
        Route::get('/author/{idAuthor}/{slug}/{page?}', 'author')->middleware('cacheResponse:10800')->where('page', '^page\-([0-9]+)');
    });

    //news
    Route::controller(NewsController::class)->name('news.')->group(function () {
        Route::get('/search', 'search')->middleware('cacheResponse:10800');
        Route::get('/', 'home')->middleware(['cacheResponse:300', 'desired.slug']);
    });

});
