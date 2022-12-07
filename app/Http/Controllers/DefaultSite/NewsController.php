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

    function static($slug)
    {
        $row=Data::staticPage($slug);

        config()->set('site.attributes.meta', [
            "title"=>$row['title']??null,
            "article_title"=>$row['title']??null,
            "site_description"=>config('site.attributes.site_description')??null,
            "article_short_desc"=>config('site.attributes.site_description')??null,
            "article_keyword"=>null,
            "article_url"=>config('site.attributes.reldomain.domain_url')??null,
            "article_last_update"=>config('site.attributes.updated_at')??null,
            "article_url_image"=> config('site.attributes.site_logo')??null,
            "type"=>'static'
        ]);

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'Staticpage',
            "category"=>[
                'name'=> config('site.attributes.title'),
            ],
        ]);

        return Site::view('pages.static',compact('row'));
    }

    /**
     * Index Berita
     */
    function indexBerita(Request $request ,$page=null)
    {
        if( $categories = collect(Data::listCategory()) )
        {
            $slug = 'index-berita';

            $page = intval(str_replace('page-', '', $page));

            $headline = $feed = null;

            $rows = Data::headline();

            if(! ($rows[0]??null) ) return abort(404);

            //get data
            if ($page<=1)
            {
                $headline = $rows[0] ?? null;

                $feed = collect($rows)->slice(1,6);
            }

            $latest = Data::latest(
                category: null,
                page: $page,
                paging: 1,
                ex_id: Util::getNewsExId($rows),
                limit: Site::isMobile() ? 25 : 50
            );
            if ($latest['attributes']['last_page']??null) {
                if ($page>$latest['attributes']['last_page']) {
                    return redirect(url('index-berita/page-'.$latest['attributes']['last_page']));
                }
            }

            $rows[0]['detail_news']=\Data::detailNews($rows[0]['news_id']??null);

            // dd(config('site.attributes'));

            // dd($rows);
            config()->set('site.attributes.meta', [
                "title" => config('site.attributes.title'),
                "article_title" => config('site.attributes.title'),
                "site_description" => config('site.attributes.site_description')??null,
                "article_short_desc" => config('site.attributes.site_description')?? null,
                "article_keyword" => config('site.attributes.meta.article_keyword') ?? null,
                "article_url" => config('site.attributes.reldomain.domain_url'),
                "article_last_update" => $headline[0]['detail_news']['news_last_update']??null,
                "article_url_image" =>  config('site.attributes.site_logo'),
                "type" => 'website'
            ]);
        

            // kly object
            config()->set('site.attributes.object', [
                "pageType"=>'ChannelPage',
                "category"=>[
                    'name'=> 'index-berita',
                    'slug'=> \Str::slug('index-berita'),
                ],
            ]);

            if(request()->ajax() || $request->api_component) {
                return view('defaultsite.mobile-v2.components.sections', [
                    'page' => $page,
                    'latest' => $latest
                ]);
            }

            return Site::view('pages.index-berita', compact('headline', 'feed', 'latest', 'slug'));
        }
        else abort(404);
    }
}
