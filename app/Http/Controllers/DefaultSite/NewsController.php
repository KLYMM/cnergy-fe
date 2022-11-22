<?php
namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Site, Data, Util, Str;

class NewsController extends Controller
{
    function home(Request $request)
    {
        $headline = Data::headline();
        // dd(config('site.ads'));
        $feed = collect($headline)->slice(1,6);

        $latest = Data::latest(
            ex_id: Util::getNewsExId($headline)
            // limit: Site::isMobile() ? 25 : 50
        );
        $headline[0]['detail_news']=\Data::detailNews($headline[0]['news_id']??null);
        config()->set('site.attributes.meta', [
            "title"=>config('site.attributes.title'),
            "article_title"=>$headline[0]['news_title']??null,
            "site_description"=>config('site.attributes.site_description'),
            "article_short_desc"=>$headline[0]['news_synopsis']??null,
            "article_keyword"=>$headline[0]['detail_news']['news_keywords'][0]['keyword_name']??null,
            "article_url"=>\Src::detail($headline[0]??null),
            "article_last_update"=>$headline[0]['detail_news']['news_last_update']??null,
            "article_url_image"=> \Src::imgNewsCdn($headline[0]??null, '640x360', 'jpeg'),
            "type"=>'website'
        ]);

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'Homepage',
            "category"=>[
                'name'=> config('site.attributes.title'),
            ],
        ]);

        return Site::view('pages.home', compact('headline', 'feed', 'latest'));
    }

    //list photo
    function photo()
    {
        $headline = Data::headline(
            path: 'photonews',
            alltype: 0,
            limit: 4,
        )??[];
        $feed = collect($headline)->slice(1,3);
        $popular= Data::popular(news_type: 'photonews',limit: 8)??[];
        $recommendation=Data::recommendation(path: 'photonews',limit: 8)??[];
        $latest = Data::latest(
            path: 'photonews',
            alltype: 0,
            ex_id: Util::getNewsExId(array_merge($headline,$popular,$recommendation)),
            limit: 32
         );

        return Site::view('pages.photo', compact('headline', 'feed','latest','recommendation','popular'));
    }
    //list video
    function video()
    {
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

        return Site::view('pages.video', compact('headline', 'feed', 'latest', 'popular'));
    }

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
            config()->set('site.attributes.meta', [
                "title"=>($rows[0]['category_name']??null)." | ".config('site.attributes.title'),
                "article_title"=>$rows[0]['news_title']??null,
                "site_description"=>config('site.attributes.site_description'),
                "article_short_desc"=>$rows[0]['news_synopsis']??null,
                "article_keyword"=>$rows[0]['detail_news']['news_keywords'][0]['keyword_name']??null,
                "article_url"=>\Src::detail($rows[0]??null),
                "article_last_update"=>$rows[0]['detail_news']['news_last_update']??null,
                "article_url_image"=> \Src::imgNewsCdn($rows[0]??null, '640x360', 'jpeg'),
                "type"=>'website'
            ]);

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

    function tag(Request $request, $slug=null, $page=null)
    {
        $page = str_replace('page-', '', $page);

        $data=Data::listNewsByTag($slug, $page, 25);
        if ($data['attributes']['last_page']??null) {
            if ($page>$data['attributes']['last_page']) {
                return redirect(url('tag/'.$slug.'/page-'.$data['attributes']['last_page']));
            }
        }

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

            $headline['detail_news']=\Data::detailNews($headline['news_id']??null);
            config()->set('site.attributes.meta', [
                "title"=>$headline['news_tag'][$key]['tag_name']." | ".config('site.attributes.title'),
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

            return Site::view('pages.tag', compact('headline', 'feed', 'rows','tag','data','photo','video'));
        }
        else abort(404);
    }

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

    function detail($category, $id, $slug=null,$page=null)
    {
        $page = $page==null?1: str_replace('page-', '', $page);

        if (request('code')!=null) {
            $preview=json_decode(base64_decode(request('code')));
            if ($preview->news_id!=$id) {
                return abort(404);
            }
            config()->set('site.device', $preview->platform);
        }

        $row = \Data::detailNews($id);

        if (($row['has_paging']??null)==1)
        {
            $row['last_page']=count($row['news_paging'])+1;
            $row['slug']=
                         ($row['news_category'][0]['url']??'')
              .'/read/'. ($row['news_id']??'')
                   .'/'. \Str::slug($row['news_title']??'') ;

            if ($row['last_page']??null) {
                if ($page>$row['last_page']) {
                    return redirect(url($row['slug'].'/page-'.$row['last_page']));
                }
            }
            if ($page>1) {
                $row['news_content']=$row['news_paging'][$page-2]['content'];
                $row['news_sub_title']=$row['news_paging'][$page-2]['title'];
                $row['cdn_image']=$row['news_paging'][$page-2]['cdn_image'];

            }

        }

        $row['current_page'] = $page;

        $row_category = $row['news_category'][0]['url']??null;

        $row_slug = Str::slug($row['news_title']??null);

        $latest = \Data::latest(
            path: $row['news_type']??'news',
            alltype: 0,
            ex_id: $row['news_id']??null,
        );

        $row['latest'] = collect($latest)->slice(0, Site::isMobile()?20:21);

        if (isset($row['news_related']) && count($row['news_related']) > 0) {
            foreach($row['news_related'] as $crosslink) {
                $crosslink_html = Site::view('components.crosslink', compact('crosslink'))->render();

                $row['news_content'] = Str::replace(
                    '['.$crosslink['code'].']',
                    $crosslink_html,
                    $row['news_content']
                );
            }
        }

        if ($category!=$row_category || $slug!=$row_slug)
        {
            return redirect(\Src::detail($row), 301);
        }

        config()->set('site.attributes.meta', [
            "title"=>($row['news_title']??null)." | ".config('site.attributes.title'),
            "article_title"=>$row['news_title']??null,
            "site_description"=>$row['news_synopsis']??null,
            "article_short_desc"=>$row['news_synopsis']??null,
            "article_keyword"=>$row['news_keywords'][0]['keyword_name']??null,
            "article_url"=>\Src::detail($row??null),
            "article_last_update"=>$row['news_last_update']??null,
            "article_url_image"=> \Src::imgNewsCdn($row??null, '640x360', 'jpeg'),
            "type"=>'article',
            "rel_to_amp" => 'amphtml',
            "ampUrl" => \Src::detailAmp($row??null)
        ]);

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'ReadPage',
            "article"=>$row,
            "ampUrl"=>\Src::detailAmp($row)??null,
            "category"=>[
                'slug'=> $row['news_category'][0]['url']??null,
                'name'=> $row['news_category'][0]['name']??null,
                'id'=> $row['news_category'][0]['id']??null,
            ],
        ]);
        // dd($row);
        if( ($row['news_type']??null) == 'photonews' )
        {
            config()->set('site.use_footer', 'no');

            return Site::view('pages.photo_detail',compact('row'));
        }
        elseif( ($row['news_type']??null) == 'video' )
        {
            return Site::view('pages.video_detail',compact('row'));
        }
        else return Site::view('pages.readpage',compact('row'));
    }

    function detailAmp($category, $id, $slug=null,$page=null)
    {
        $page = $page==null?1: str_replace('page-', '', $page);

        if (request('code')!=null) {
            $preview=json_decode(base64_decode(request('code')));
            if ($preview->news_id!=$id) {
                return abort(404);
            }
        }
        config()->set('site.device', 'mobile');

        $row = \Data::detailNews($id);

        // if ($row['news_last_update']<date('Y-m-d',strtotime("-30days"))) return redirect(\Src::detail($row));

        if (($row['has_paging']??null)==1) {
            $row['last_page']=count($row['news_paging'])+1;
            $row['slug']=
                         ($row['news_category'][0]['url']??'')
              .'/read/'. ($row['news_id']??'')
                   .'/'. \Str::slug($row['news_title']??'') ;

            if ($row['last_page']??null) {
                if ($page>$row['last_page']) {
                    return redirect(url('amp/'.$row['slug'].'/page-'.$row['last_page']));
                }
            }
            if ($page>1) {
                $row['news_content']=$row['news_paging'][$page-2]['content'];
                $row['news_sub_title']=$row['news_paging'][$page-2]['title'];
                $row['cdn_image']=$row['news_paging'][$page-2]['cdn_image'];

            }

        }

        $row['current_page'] = $page;

        $row_category = $row['news_category'][0]['url']??null;

        $row_slug = Str::slug($row['news_title']??null);

        $latest = \Data::latest(
            path: $row['news_type']??'news',
            alltype: 0,
            ex_id: $row['news_id']??null,
        );

        $row['latest'] = collect($latest)->slice(0, Site::isMobile()?20:21);

        if (isset($row['news_related']) && count($row['news_related']) > 0) {
            foreach($row['news_related'] as $crosslink) {
                $crosslink_html = Site::view('amp.components.crosslink',compact('crosslink'))->render();

                $row['news_content'] = Str::replace(
                    '['.$crosslink['code'].']',
                    $crosslink_html,
                    $row['news_content']
                );
            }
        }

        if ($category!=$row_category || $slug!=$row_slug)
        {
            return redirect(\Src::detailAmp($row), 301);
        }
        config()->set('site.attributes.meta', [
            "title"=>($row['news_title']??null)." | ".config('site.attributes.title'),
            "article_title"=>$row['news_title']??null,
            "site_description"=>$row['news_synopsis']??null,
            "article_short_desc"=>$row['news_synopsis']??null,
            "article_keyword"=>$row['news_keywords'][0]['keyword_name']??null,
            "article_url"=>\Src::detailAmp($row??null),
            "article_last_update"=>$row['news_last_update']??null,
            "article_url_image"=> \Src::imgNewsCdn($row??null, '640x360', 'jpeg'),
            "type"=>'article',
            "rel_to_non_amp" => 'canonical',
            "nonAmpUrl" => \Src::detail($row??null)
        ]);

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'ReadPage',
            "article"=>$row,
            "category"=>[
                'slug'=> $row['news_category'][0]['url']??null,
                'name'=> $row['news_category'][0]['name']??null,
                'id'=> $row['news_category'][0]['id']??null,
            ],
        ]);
        $imageRich=[];
        if($row['news_image']??null) {
            foreach ($row['news_image'] as $value) {
                array_push($imageRich,$value);
            }
        }
        $datarich=json_encode([
            "@context"=>'https://schema.org',
            "@type"=>'NewsArticle',
            "author"=>[
                "@type"=>'person',
                "name"=>$row['news_editor'][0]['name']??null,
                "url"=>$row['news_editor'][0]['name']??null,
            ],
            "dateModified"=>$row['news_last_update']??null,
            "datePublished"=>$row['news_entry']??null,
            "description"=>$row['news_synopsis']??null,
            "headline"=>$row['news_title']??null,
            "image"=> $imageRich,
            "publisher"=>[
                "@type"=>'Organization',
                "logo"=>[
                    "@type"=>'ImageObject',
                    "height"=>60,
                    "width"=>92,
                    "url"=>config('site.attributes.favicon')??null,
                ],
                "name"=>config('site.attributes.reldomain.domain_name')??null,
            ],
            "mainEntityOfPage"=>\Src::detailAmp($row)??null,
        ],JSON_UNESCAPED_SLASHES);

        // if( ($row['news_type']??null) == 'photonews' )
        // {
        //     config()->set('site.use_footer', 'no');

        //     return Site::view('amp.pages.photo_detail',compact('row'));
        // }
        // else
        if( ($row['news_type']??null) == 'video' )
        {
            return Site::view('amp.pages.video_detail',compact('row','datarich'));
        }
        else return Site::view('amp.pages.readpage',compact('row','datarich'));
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

            config()->set('site.attributes.meta', [
                "title"=>($rows[0]['category_name']??null)." | ".config('site.attributes.title'),
                "article_title"=>$rows[0]['news_title']??null,
                "site_description"=>config('site.attributes.site_description'),
                "article_short_desc"=>$rows[0]['news_synopsis']??null,
                "article_keyword"=>$rows[0]['detail_news']['news_keywords'][0]['keyword_name']??null,
                "article_url"=>\Src::detail($rows[0]??null),
                "article_last_update"=>$rows[0]['detail_news']['news_last_update']??null,
                "article_url_image"=> \Src::imgNewsCdn($rows[0]??null, '640x360', 'jpeg'),
                "type"=>'website'
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
