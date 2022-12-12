<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class VideoController extends Controller
{
    //list video
    function video()
    {
        $slug = 'video';
        $headline = Data::headline(
            path: 'video',
            alltype: 0,
            limit: 5,
        )??[];
        $feed = collect($headline)->slice(1,4);
        $popular= Data::popular(news_type: 'video')??[];
        $latest = Data::latest(
            path: 'video',
            alltype: 0,
            ex_id: Util::getNewsExId(array_merge($popular,$headline)),
            limit: 30
        );
        // dd($headline);

        $categories = collect(Data::listCategory(nested: false));

        $metaTitle = "";
        $metaDesc = "";
        foreach ($categories as $meta ) {

            if($slug == $meta["url"] ) {
                $metaTitle = $meta['meta_name'];
                $metaDesc = $meta['meta_description'];
            }
        }
        // dd($categories);
        config()->set('site.attributes.meta', [
            "title"=>$metaTitle,
            "article_title" => config('site.attributes.title'),
            "site_description" => $metaDesc,
            "article_short_desc" => $metaDesc,
            "article_keyword" => config('site.attributes.meta.article_keyword') ?? null,
            "article_url" => config('site.attributes.reldomain.domain_url'),
            "article_last_update" => $headline[0]['detail_news']['news_last_update']??null,
            "article_url_image" =>  config('site.attributes.site_logo'),
            "type" => 'website'
        ]);


        return Site::view('pages.video', compact('headline', 'feed', 'latest', 'popular'));
    }
}
