<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class TagController extends Controller
{
    function getTag($id) {
        $row = \Data::detailNews($id);
        return view('defaultsite.mobile-v2.components.sections', [
            'page' => 1,
            'latest' => ['data' => [$row]],
        ]);
    }
    // Tag News

    function tag(Request $request, $slug=null, $page=null, $newsid=null, $newslug=null)
    {
        // dd($newslug);
        $page = str_replace('page-', '', $page);

        $data=Data::listNewsByTag($slug, $page, 25);
        // if ($data['attributes']['last_page']??null) {
        //     if ($page>$data['attributes']['last_page']) {
        //         return redirect(url('tag/'.$slug.'/page-'.$data['attributes']['last_page']));
        //     }
        // }
        if ($newsid && $page==1) {
           
           $news = \Data::detailNews($newsid);
        //    dd($news['news_url']);
           if (!$news){
            return abort(404);
           }
           if (\Str::slug($news['news_title']) != $newslug) {
            return redirect(\Src::tag($news));
              }

            $data['data']=array_merge([$news], $data['data']);
           
        }
      
    //    dd($data); 
        if( $rows = collect($data['data']??null) )
        {
            if( !($rows[0]['news_tag'][0]['tag_id']??null) ) return abort(404);

            $headline = $rows[0] ?? null;

            $feed = $rows->slice(1, $rows->count());

            $key = array_search($slug, array_column($rows[0]['news_tag'], 'tag_url'));

            $tag = Data::detailTag($rows[0]['news_tag'][$key]['tag_id'])??null;

            $video=Data::listNewsByTag(
                tagUrl: $slug,
                limit: 2,
                news_type: "video"
            )['data']??null;

            $photo=Data::listNewsByTag(
                tagUrl: $slug,
                limit: 2,
                news_type: "photonews"
            )['data']??null;

            $tagName = $headline['news_tag'][$key]['tag_name'];

            $headline['detail_news']=\Data::detailNews($headline['news_id']??null);
            config()->set('site.attributes.meta', [
                "title"=>"Understandable and Credible ".$tagName." articles.",
                "article_title"=>"Understandable and Credible ".$tagName." articles.",
                "site_description"=>"News with simple English. Provide best ".$tagName." articles for you that are trustworthy and understandable.",
                "article_short_desc"=>"News with simple English. Provide best ".$tagName." articles for you that are trustworthy and understandable.",
                "article_keyword"=>$headline['detail_news']['news_keywords'][0]['keyword_name']??null,
                "article_url"=>\Src::detail($headline??null),
                "article_last_update"=>$headline['detail_news']['news_last_update']??null,
                "article_url_image"=> \Src::imgNewsCdn($headline??null, '640x360', 'jpeg'),
                "type"=>'website'
            ]);
            //  dd(config('site.attributes'));


            //kly object
            config()->set('site.attributes.object', [
                "pageType"=>'TagPage',
                "category"=>[
                    'name'=> config('site.attributes.title'),
                ],
            ]);

            if(request()->ajax() || $request->api_component) {
                return view('defaultsite.mobile-v2.components.sections', [
                    'page' => $page,
                    'latest' => $data,
                ]);
            }

            return Site::view('pages.tag', compact('headline', 'feed', 'rows','tag','data','photo','video', 'slug'));
        }
        else abort(404);
    }
}
