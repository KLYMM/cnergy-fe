<?php
namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;

use Site, Data, Util, Src;

class SiteMapController extends Controller
{
    /**
     * INDEX SITE MAP
     */
    function index($urls = [])
    {
        if( !$urls )
        {
            $urls = [
                url('sitemap_tag.xml'),
                url('sitemap_web.xml'),
                url('sitemap_news.xml'),
                url('photo/sitemap_image.xml'),
                url('video/sitemap_video.xml'),
            ];

            $categories = collect(Data::listCategory())->pluck('url')->toArray();
            
            foreach( [...$categories] as $path )
            { 
                $urls = [...$urls, ...[
                    url($path.'/sitemap_web.xml'),
                    url($path.'/sitemap_news.xml'),
                    url($path.'/sitemap_video.xml'),
                    url($path.'/sitemap_image.xml'),
                ]];
            }

        }

        return response()->view('sitemap.index', compact('urls'))->header('Content-Type', 'text/xml');
    }

    /**
     * TYPE NEWS
     */
    function news($rows = [])
    {
        if( !$rows )
        {
            $rows = Data::latest(
                path: 'news',
                alltype: 0,
                limit: 1000,
                start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
                end_date: date('Y-m-d 23:59:59')
            );
        }
        #dd($rows[0]);
        return response()->view('sitemap.news', compact('rows'))->header('Content-Type', 'text/xml');
    }

    function index_news() 
    {
        $rows = Data::latest();

        return response()->view('sitemap.index_news', compact('rows'))->header('Content-Type', 'text/xml');
    }

    /**
     * TYPE PHOTO
     */
    function photo($rows = [])
    {
        if( !$rows )
        {
            // $rows = Data::latest(
            //     path: 'photonews',
            //     alltype: 0,
            //     limit: 1000,
            //     start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
            //     end_date: date('Y-m-d 23:59:59')
            // );

            $rows = Data::headline(
                path: 'photonews',
                alltype: 0,
                limit: 1000,
            );
        }

        // dd($rows);
        
        return response()->view('sitemap.image', compact('rows'))->header('Content-Type', 'text/xml');
    }

    /**
     * TYPE VIDEO
     */
    function video($rows = [])
    {
        if( !$rows )
        {
            // $rows = Data::latest(
            //     path: 'video',
            //     alltype: 0,
            //     limit: 1000,
            //     start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
            //     end_date: date('Y-m-d 23:59:59')
            // );

            $rows = Data::headline(
                path: 'video',
                alltype: 0,
                limit: 1000,
            );
        }

        return response()->view('sitemap.video', compact('rows'))->header('Content-Type', 'text/xml');
    }

    /**
     * INDEX CATEGORY
     */
    function category($slug, $type)
    {
        $categories = collect(Data::listCategory())->toArray();

        //index
        if( $type == 'web' )
        {
            $urls = [];
            foreach( $categories as $list ){
                
                if($slug == $list['url']){
                    $urls = Data::listNewsByCategory(
                        categoryId: $list['id'],
                        limit: 1000,
                        path: 'news',
                        alltype: 1,
                        start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
                        end_date: date('Y-m-d 23:59:59')
                    );                  
                    
                }                
            }
            // dd($urls);

            return $this->index($urls);
        }
        //news
        else if( $type == 'news' )
        {
            $rows = [];
            foreach( [...$categories] as $list ){
                
                if($slug == $list['url']){
                    $rows = Data::listNewsByCategory(
                        categoryId: $list['id'],
                        limit: 1000,
                        path: 'news',
                        alltype: 0,
                        start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
                        end_date: date('Y-m-d 23:59:59')
                    );                    
                }                
            }
            
            return $this->news($rows['data']);
        }
        //photo
        else if( $type == 'image' )
        {            
            $rows = [];
            foreach( [...$categories] as $list ){
                
                if($slug == $list['url']){
                    $rows = Data::listNewsByCategory(
                        categoryId: $list['id'],
                        limit: 1000,
                        path: 'photonews',
                        alltype: 0,
                        start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
                        end_date: date('Y-m-d 23:59:59')
                    );
                    
                }
                
            }
            #dd($rows['data']);

            return $this->photo($rows['data']);
        }
        //video
        else if( $type == 'video' )
        {
            $rows = [];
            foreach( [...$categories] as $list ){
                
                if($slug == $list['url']){
                    $rows = Data::listNewsByCategory(
                        categoryId: $list['id'],
                        limit: 1000,
                        path: 'video',
                        alltype: 0,
                        start_date: date('Y-m-d 00:00:01', strtotime('-1 days')),
                        end_date: date('Y-m-d 23:59:59')
                    );
                    
                }
                
            }
            #dd($rows);
            return $this->video($rows['data']);
        }
    }

     /**
     * TYPE TAG
     */
    function tag()
    {
        $rows=Data::listTag(limit: 1000)??null;
        // dd($rows);
        return response()->view('sitemap.tag', compact('rows'))->header('Content-Type', 'text/xml');
    }

    /**
     * ROBOTS TXT
     */
    function robots()
    {
        return response(config('site.attributes.reldomain.robots_txt'), 200)->header('Content-Type', 'text/plain');
    }

    /**
     * ADS TXT
     */
    function ads()
    {
        return response(config('site.attributes.reldomain.ads_txt'), 200)->header('Content-Type', 'text/plain');
    }
    
    /**
     * MANIFEST PWA
     */
    function manifest()
    {
        $icons = [];

        foreach( ['114x114', '120x120', '152x152', '196x196', '512x512'] as $s )
        {
            $icons[] = [
                "src"=> Src::imgNewsCdn(config('site.attributes'), $s, 'jpeg', 'file_favicon'),
                "type"=> "image/png",
                "sizes"=> $s,
                "purpose"=> "any maskable"
            ];

        }
        return response()->json([
            "short_name"=> config('site.attributes.reldomain.domain_name', 'hyperlocal'),
            "name"=> config('site.attributes.title'),
            "description"=> config('site.attributes.site_description'),
            "start_url"=> "/?source=pwa",
            "background_color"=> config('site.attributes.color'),
            "display"=> "standalone",
            "scope"=> "/",
            "theme_color"=> config('site.attributes.color'),
            "icons"=> $icons
        ]);
    }
}