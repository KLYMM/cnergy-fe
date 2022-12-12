<?php

namespace App\Helpers;

class Src 
{
    /**
     * Asset URL base on namespace and agent
     */
    static function asset($path)
    {
        return asset(config('site.path', 'defaultsite')
        .'/' . config('site.device', 'mobile')
        .'/' . $path);
    }

    /**
     * MIX URL base on namespace and agent
     */
    static function mix($path)
    {
        $filePath = config('site.path', 'defaultsite')
             .'/' . config('site.device', 'mobile')
             .'/' . $path;

        return asset(
            str_replace('static/', '', 
                mix($filePath, 'static')
            )
        );
    }

    /**
     * DETAIL NEWS URL
     * [domain]/[kanal/]read/[id]/[slug]
     */
    static function detail($row)
    {
        return url( 
                   ($row['news_category'][0]['url']??'') 
        .'/read/'. ($row['news_id']??'') 
             .'/'. \Str::slug($row['news_title']??'') 
        );
    }
     /**
     * DETAIL NEWS URL
     * [domain]/[kanal/]read/[id]/[slug]
     */
    static function tag($row)
    {
       
        return url( 
                   'tag/'.($row['news_tag'][0]['tag_url']??'') 
        .'/page-1/'. ($row['news_id']??'') 
             .'/'. \Str::slug($row['news_title']??'') 
        );
    }


    /**
     * DETAIL AUTHOR
     * [domain]/author/[id]/[name]
     */
    static function author($row)
    {
        return url(                   
        '/author/'. ($row['news_editor'][0]['id']??'') 
             .'/'. \Str::slug($row['news_editor'][0]['name']??'') 
        );
    }

    /**
     * DETAIL NEWS URL AMP
     * [domain]/amp/[kanal/]read/[id]/[slug]
     */
    static function detailAmp($row)
    {
        return url( 
         '/amp/'.  ($row['news_category'][0]['url']??'') 
        .'/read/'. ($row['news_id']??'') 
             .'/'. \Str::slug($row['news_title']??'') 
        );
    }

    /**
     * CATEGORY NEWS
     * [domain]/[kanal/]
     */
    static function category($row, $page=null)
    {
        $categoryUrl = '';

        if( $row['news_category']??null  )
        {
            foreach( $row['news_category'] as $c )
            {
                $categoryUrl.= '/'.($c['url']??'');
            }
        }

        return url(
            ( trim($categoryUrl, '/') )
          . ( $page ? '/page-'.$page : '' )
        );

        /*return url(
            ( $row['news_category'][0]['url']??'' )
          . ( $page ? '/page-'.$page : '' )
        );*/
    }

    /**
     * DETAIL TAG
     * [domain]/tag/[nama-tag]
     */
    static function detailTag($row, $page=null)
    {
        return url( 
            'tag/'. ( $row['tag_url']??($row['tag']['url']??'') ) 
                  . ( $page ? '/page-'.$page : '' )
        );
    }

    /**
     * Generate Image Url with CDN Image Resize On The Fly
     * @param $path (string) url image klimg url path
     * @param $size (string) width x height (height: nullable to set auto)
     * @param $format (string) jpeg or webp
     */
    static function img( $path, $size, $format='jpeg' )
    {
        $file = str_replace( 
                    config('app.klimg_url') .'/', '', 
                    $path 
                );

        return config('app.cndimg_url') 
         .'/'. $format
         .'/'. $size
         .'/'. $file;
    }

    /**
     * Generate Image Url with CDN Image Resize On The Fly
     * @param $row (array) news row
     * @param $size (string) width x height (height: nullable to set auto)
     * @param $format (string) jpeg or webp
     */
    static function imgNewsCdn( $row, $size, $format='jpeg', $field='file_image' )
    {
        if( $row['cdn_image'][$field] ?? null )
        {
            return trim($row['cdn_image']['cdnimg_url'], '/')
             .'/'. $format 
             .'/'. $size 
             .'/'. $row['cdn_image'][$field];
        }
    }

    static function categories($slug)
    {
        $rows=Data::listCategory(limit:100,nested:false);

        $return=[];
        foreach ($rows as $row){
            $return['id_category'][$row['id']]=$row;
            $return['id_parent'][$row['id']]=$row['parent'];
            $return['slug_id'][$row['url']]=$row['id'];
        }

        return  $return;
    }
    static function menu_tree($slug)
    {
        $rows=Data::menu(nested:'no');
        $return=[];
        $category_tree=[];
        foreach ($rows as $row){
            $return['id_category'][$row['id']]=$row;
            $return['id_parent'][$row['id']]=$row['parent'];
            $arr_slug=explode('/','/'.trim($row['url'],'/'));
            $return['slug_id'][end($arr_slug)]=$row['id'];
        }
        if (array_key_exists($slug,$return['slug_id'])) {
            $id_slug=$return['slug_id'][$slug];
            $first_category=array_search($id_slug, array_column($rows, 'id'));
            $category_tree[0]=$rows[$first_category];
    
            while (end($category_tree)['parent']!=0){
                $arr_slug=explode('/',trim(end($category_tree)['url'],'/'));
                array_push($category_tree,$return['id_category'][$return['id_parent'][$return['slug_id'][end($arr_slug)]]]);
            }
        }

        return  $category_tree;
    }
}