<?php
namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class NewsController extends Controller
{
    function home(Request $request)
    {
        $headline = Data::headline();
        // dd(config('site.ads'));
        $feed = collect($headline)->slice(1,6);

        $latest = Data::latest(
            // ex_id: Util::getNewsExId($headline)
            // limit: Site::isMobile() ? 25 : 50
        );
        $headline[0]['detail_news']=\Data::detailNews($headline[0]['news_id']??null);

        $ogImage = "https://cdns.klimg.com/newshub.id//real/2022/12/01/3255650/og-image-homepage-trstdly.png";


        config()->set('site.attributes.meta', [
            "title" => config('site.attributes.title'),
            "article_title" => config('site.attributes.title'),
            "site_description" => config('site.attributes.site_description')??null,
            "article_short_desc" => config('site.attributes.site_description')?? null,
            "article_keyword" => config('site.attributes.meta.article_keyword') ?? null,
            "article_url" => config('site.attributes.reldomain.domain_url'),
            "article_last_update" => $headline[0]['detail_news']['news_last_update']??null,
            "article_url_image" =>  $ogImage,
            "type" => 'website'
        ]);
        // dd(config('site.attributes'));

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'Homepage',
            "category"=>[
                'name'=> config('site.attributes.title'),
            ],
        ]);

        return Site::view('pages.home', compact('headline', 'feed', 'latest'));
    }

    function search()
    {
        config()->set('site.attributes.meta', [
            "title"=>config('site.attributes.title')??null,
            "article_title"=>config('site.attributes.title')??null,
            "site_description"=>config('site.attributes.site_description')??null,
            "article_short_desc"=>config('site.attributes.site_description')??null,
            "article_keyword"=>$_GET['q']??null,
            "article_url"=>config('site.attributes.reldomain.domain_url')??null,
            "article_last_update"=>config('site.attributes.updated_at')??null,
            "article_url_image"=> config('site.attributes.site_logo')??null,
            "type"=>'search'
        ]);

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'Searchpage',
            "category"=>[
                'name'=> config('site.attributes.title'),
            ],
        ]);

        return Site::view('pages.search');
    }
}
