<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class AuthorControler extends Controller
{
    // Author 
    function author($idAuthor=null, $slug=null, $page=null)
    {
        $page = str_replace('page-', '', $page);

        $data = Data::latest(
            author: $idAuthor,
            page: $page,
            limit: Site::isMobile() ? 5 : 10,
            paging: 1
        );
        if ($data['attributes']['last_page']??null) {
            if ($page>$data['attributes']['last_page']) {
                return redirect(url('author/'.$idAuthor.'/'.$slug.'/page-'.$data['attributes']['last_page']));
            }
        }

        if( $rows = collect($data['data']??null) )
        {
            if( !($rows[0]??null) ) return abort(404);

            $author = array_column($rows[0]['news_editor'], 'name');
            $author = array_filter($author, function($v) use($slug) {
                $s = \Str::slug($v);
                return $s == $slug;
            });

            if(!$author) return redirect(\Src::author($rows[0]));

            $headline = $rows[0] ?? null;

            $feed = $rows->slice(1, $rows->count());

            $video = Data::latest(
                path: 'video',
                author: $idAuthor,
                limit: 2,
                paging: 1,
                alltype: 0,
            )['data']??null;

            $photo = Data::latest(
                path: 'photonews',
                author: $idAuthor,
                limit: 2,
                paging: 1,
                alltype: 0,
            )['data']??null;

            $headline['detail_news']=\Data::detailNews($headline['news_id']??null);

            config()->set('site.attributes.meta', [
                "title"=>$headline['detail_news']['news_editor'][0]['name']." | ".config('site.attributes.title'),
                "article_title"=>$headline['news_title']??null,
                "site_description"=>config('site.attributes.site_description'),
                "article_short_desc"=>$headline['news_synopsis']??null,
                "article_keyword"=>$headline['detail_news']['news_keywords'][0]['keyword_name']??null,
                "article_url"=>\Src::detail($headline??null),
                "article_last_update"=>$headline['detail_news']['news_last_update']??null,
                "article_url_image"=> \Src::imgNewsCdn($headline??null, '640x360', 'jpeg'),
                "type"=>'website'
            ]);
            //kly object
            config()->set('site.attributes.object', [
                "pageType"=>'ChannelPage',
                "category"=>[
                    'name'=> config('site.attributes.title'),
                ],
            ]);
            return Site::view('pages.author', compact('headline', 'feed', 'rows', 'data', 'photo', 'video','idAuthor','author'));
        }
        else abort(404);
    }
}
