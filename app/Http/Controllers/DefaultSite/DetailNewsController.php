<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HtmlChunk;

use Site, Data, Util, Str;

class DetailNewsController extends Controller
{
    // Detail News
    function detail($category, $id, $slug=null, $page=null, $debug=null)
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
            "site_description"=>config('trstdly.prefix_description').$row['news_synopsis']??null,
            "article_short_desc"=>config('trstdly.prefix_description').$row['news_synopsis']??null,
            "article_keyword"=>$row['news_keywords'][0]['keyword_name']??null,
            "article_url"=>\Src::detail($row??null),
            "article_last_update"=>$row['news_last_update']??null,
            "article_url_image"=> \Src::imgNewsCdn($row??null, '640x360', 'jpeg'),
            "type"=>'article',
            "rel_to_amp" => 'amphtml',
            "ampUrl" => \Src::detailAmp($row??null)
        ]);
        // dd($row);

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

        if($debug != true) {
            $rowHtml = new HtmlChunk($row);
            $content = $rowHtml->parseNews($row);
            // dd($content);
            return Site::view('pages.detail.index', compact('content', 'row'));
        }

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
}
