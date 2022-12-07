<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class CategoryController extends Controller
{
    /**
     * News Category
     */
    function category(Request $request, ...$params)
    {
        $slug = head($params);
        $page = null;

        if (count($params) > 1)
        {
            $slug = last($params);

            if ( Str::contains(last($params), 'page-') )
            {
                $page = last($params);
                $slug = $params[array_key_last($params) - 1];

                array_pop($params);
            }
        }

        $paginationUrl = implode('/', $params);

        if( $categories = collect(Data::listCategory(nested: false)) )
        {
            // dd($categories);
            $url_name = $categories->pluck('name', 'url')[$slug] ?? null;

            $url_id = $categories->pluck('id', 'url')[$slug] ?? null;

            if( !$url_id ) return abort(404);

            $page = intval(str_replace('page-', '', $page));

            $headline = $feed = null;

            $rows = Data::headline($url_id);

            if(! ($rows[0]??null) ) return abort(404);

            //get data
            if ($page<=1)
            {
                $headline = $rows[0] ?? null;

                $feed = collect($rows)->slice(1,6);
            }

            $latest = Data::latest(
                category: $url_id,
                page: $page,
                paging: 1,
                ex_id: Util::getNewsExId($rows),
                limit: Site::isMobile() ? 25 : 50
            );

            if ($latest['attributes']['last_page']??null) {
                if ($page>$latest['attributes']['last_page']) {
                    return redirect(url(implode('/',$params).'/page-'.$latest['attributes']['last_page']));
                }
            }

            $rows[0]['detail_news']=\Data::detailNews($rows[0]['news_id']??null);

            $metaTitle = "";
            $metaDesc = "";
            foreach ($categories as $meta ) {

                if($slug == $meta["url"] ) {
                    $metaTitle = $meta['meta_name'];
                    $metaDesc = $meta['meta_description'];
                }
            }


            config()->set('site.attributes.meta', [
                "title"=>$metaTitle,
                "article_title"=>$metaTitle,
                "site_description"=>$metaDesc,
                "article_short_desc"=>$metaDesc,
                "article_keyword"=>$rows[0]['detail_news']['news_keywords'][0]['keyword_name']??null,
                "article_url"=>\Src::detail($rows[0]??null),
                "article_last_update"=>$rows[0]['detail_news']['news_last_update']??null,
                "article_url_image"=> \Src::imgNewsCdn($rows[0]??null, '640x360', 'jpeg'),
                "type"=>'website'
            ]);
            // dd(config('site.attributes'));

            //kly object
            config()->set('site.attributes.object', [
                "pageType"=>'ChannelPage',
                "category"=>[
                    'name'=> $url_name,
                    'slug'=> \Str::slug($url_name),
                    'id'=> $url_id,
                ],
            ]);

            $slug = $paginationUrl;

            if(request()->ajax() || $request->api_component) {
                return view('defaultsite.mobile-v2.components.sections', [
                    'page' => $page,
                    'latest' => $latest
                ]);
            }

            return Site::view('pages.category', compact('headline', 'feed', 'latest', 'slug'));
        }
        else abort(404);
    }

    
}
