<?php

namespace App\Helpers;

use Site, Str;

class Data {

    protected static $defaultListNews = [
        'news_id', 'news_type', 'news_title', 'news_date_publish', 'news_category',  'category_name',
        'news_synopsis', 'news_url', 'news_image', 'cdn_image', 'news_tag', 'photonews', 'photonews_count','news_editor'
    ];

    /**
     * Get menu
     */
    static function menu($force=false,$nested=true,$position='header')
    {
        $rows = Site::api(
            path : 'setting-fe-menu',
            key  : 'get-menu-'.$nested.'-'.$position,
            ttl  : '7minutes',
            force: $force,
            tags : ['global', 'menu'],
            params : [
                'nested'=> $nested,
                'position'=> $position
            ]
        );

        return $rows;
    }

    /**
     * Get Headline
     */
    static function headline($category=null, $page=1, $force=false, $path='news', $alltype=1, $limit=7)
    {
        $rows = Site::api(
            path : $path,
            key  : 'get-headline-'.$category.'-'.$page.'-'.$path.'-'.$alltype.'-'.$limit,
            ttl  : '4minutes',
            force : $force,
            fields : self::$defaultListNews,
            deep : 2,
            params : [
                'page'=> $page,
                'limit'=> $limit,
                'headline'=> 1,
                'alltype'=> $alltype,
                'category'=> $category,
                'published'=> 1,
                'orderby'=> 'news_date_publish-desc'
            ]
        );

        return $rows['data'] ?? null;
    }

    /**
     * Get Populer
     */
    static function popular($category=null, $page=1, $force=false, $news_type=null,$limit=10)
    {
        $rows = Site::api(
            path : 'popular',
            key  : 'get-popular-'.$category.'-'.$page.'-'.$news_type.'-'.$limit,
            ttl  : '8minutes',
            force : $force,
            fields : self::$defaultListNews,
            deep : 2,
            tags : ['popular', 'global'],
            params : [
                'page'=> $page,
                'limit'=> $limit,
                'category'=> $category,
                'news_type'=> $news_type,
                'has_potrait'=> false,
                'start_date'=> date('Y-m-d',strtotime("-".config('site.attributes.popular_day', 3)."months")),
                'end_date'=> date('Y-m-d')
            ]
        );

        //replace news url
        if( $rows['data'] ?? null )
        {
            $rows['data'] = array_map( function($v) {

                $v['news_url'] = Str::slug($v['news_title']);

                return $v;

            }, $rows['data']);
        }

        return $rows['data'] ?? null;
    }

    /**
     * Get Recommendation
     */
    static function recommendation( $row=null, $limit=10, $force=false, $path='news' )
    {
        //base on tag
        if( $row['news_tag']??null )
        {
            $rows = [];

            foreach( $row['news_tag'] as $t )
            {
                $rows = [...$rows, ...self::listNewsByTag($t['tag_url'], 1, $limit-count($rows))['data'] ?? []];

                $rows = array_filter($rows);
            }
            $rows= array_map("unserialize", array_unique(array_map("serialize", $rows)));

            if( count($rows) < $limit )
            {
                $rows = [...$rows, ...self::latest(null, 1, ($limit - count($rows)),ex_id:Util::getNewsExId($rows))];
            }

            return $rows;
        }
        else
        {
            $rows = Site::api(
                path : $path,
                key  : 'get-recommendation'.'-'.$path.'-'.$limit,
                ttl  : '9minutes',
                force : $force,
                fields : self::$defaultListNews,
                deep : 2,
                tags : ['recommendation', 'global'],
                params : [
                    'page'=> 1,
                    'limit'=> $limit,
                    'editorpick'=> 1,
                    'published'=> 1,
                    'orderby'=> 'news_date_publish-desc'
                ]
            );

            return $rows['data'] ?? [];
        }
    }

    /**
     * Get Lates News
     */
    static function latest( $category=null, $page=1, $limit=25, $max_id=null, $paging=false, $path='news', $ex_id=null, $force=false, $alltype=1, $publish_at=null, $start_date=null, $end_date=null, $author=null  )
    {
        if( $paging ) self::$defaultListNews = '*';

        $rows = Site::api(
            path : $path,
            key  : 'get-latest-'.$category.'-'.$page.'-'.$limit.'-'.$max_id.'-'.$path.'-'.$ex_id.'-'.$alltype.'-'.$publish_at.'-'.$start_date.'-'.$end_date.'-'.$author,
            ttl  : '6minutes',
            tags : ['news', 'latest', 'category-'.$category],
            force : $force,
            fields : self::$defaultListNews,
            deep : 2,
            params : [
                'page'=> $page,
                'limit'=> $limit,
                'max_id'=> $max_id,
                'ex_id'=> $ex_id,
                'category'=> $category,
                'alltype'=> $alltype,
                'author'=> $author,
                'publish_at'=> $publish_at,
                'start_date'=> $start_date,
                'end_date'=> $end_date,
                'published'=> 1,
                'orderby'=> 'news_date_publish-desc'
            ]
        );

        return ( $paging ) ? $rows : ($rows['data'] ?? []);
    }

    /**
     * Get Trending Tag
     */
    static function trendingTag($force=false)
    {
        $rows = Site::api(
            path : 'today-tag',
            key  : 'get-trending-tag',
            force : $force,
            fields : ['id','title', 'tag'],
            deep : 2,
            ttl  : '6minutes',
            tags : ['tag', 'trending', 'global'],
        );

        return $rows['data'] ?? [];
    }

    /**
     * Get List Tag
     */
    static function listTag( $page=1, $limit=25, $force=false )
    {
        $rows = Site::api(
            path : 'tag',
            key  : 'get-list-tag-'.$page.'-'.$limit,
            ttl  : '11minutes',
            force: $force,
            tags : ['tag'],
            params : [
                'page'=> $page,
                'limit'=> $limit
            ]
        );

        return $rows['data'] ?? [];
    }

    /**
     * Get Detail Tag
     */
    static function detailTag( $tagID, $force=false )
    {
        $rows = Site::api(
            path : 'tag/'.$tagID.'/',
            key  : 'get-detail-tag-'.$tagID,
            ttl  : '6minutes',
            force: $force,
            tags : ['tag']
        );

        return $rows;
    }

    /**
     * Get Detail News
     */
    static function detailNews( $newsID, $force=false )
    {
        if(!$newsID) return null;

        $rows = Site::api(
            path : 'news/'.$newsID.'/'.($force?'&limit='.rand(0,9):''),
            key  : 'get-detail-news-'.$newsID,
            ttl  : '180minutes',
            force: $force,
            tags : ['news', 'news-'.$newsID],
            // params : [
            //     'alltype'=> 1,
            // ]
        );

        return $rows;
    }

    /**
     * Get List Category
     */
    static function listCategory( $page=1, $limit=250, $force=false, $nested=true )
    {
        $rows = Site::api(
            path : 'category',
            key  : 'get-list-category-'.$page.'-'.$limit,
            ttl  : '5minutes',
            tags : ['category', 'global'],
            force : $force,
            fields : ['name', 'url', 'id', 'parent'],
            params : [
                'page'=> $page,
                'nested'=> $nested ? 'yes' : 'no',
                'limit'=> $limit
            ]
        );

        return $rows;
    }

    /**
     * Get List News By Tag
     */
    static function listNewsByTag( $tagUrl, $page=1, $limit=25, $force=false, $news_type=null )
    {
        $rows = Site::api(
            path : 'news/hashtag/'.$tagUrl,
            key  : 'get-list-news-by-tag-'.$tagUrl.'-'.$page.'-'.$limit.'-'.$news_type,
            ttl  : '14minutes',
            tags : ['news', $tagUrl],
            force : $force,
            deep : 2,
            fields : '*',
            params : [
                'page'=> $page,
                'news_type'=> $news_type,
                'limit'=> $limit
            ]
        );

        return $rows;
    }

    /**
     * Get List News By Category
     */
    static function listNewsByCategory( $categoryId, $page=1, $limit=25, $force=false, $path='news', $alltype=1, $start_date=null, $end_date=null )
    {
        $rows = Site::api(
            path : $path,
            key  : 'get-list-news-by-category-'.$categoryId.'-'.$page.'-'.$limit.'-'.$path.'-'.$alltype.'-'.$start_date.'-'.$end_date,
            ttl  : '16minutes',
            force : $force,
            tags : ['news', 'category-'.$categoryId],
            deep : 2,
            fields : self::$defaultListNews,
            params : [
                'category'=> $categoryId,
                'page'=> $page,
                'limit'=> $limit,
                'alltype'=> $alltype,
                'start_date'=> $start_date,
                'end_date'=> $end_date,
                'published'=> 1,
                'orderby'=> 'news_date_publish-desc'
            ]
        );

        return $rows;
    }

    /**
     * Get Static Page
     */
    static function staticPage(  $slug=null,$force=false )
    {
        $rows = Site::api(
            path : 'static-page/'.$slug,
            key  : $slug,
            ttl  : '60minutes',
            force: $force,
        );

        return $rows;
    }

    /**
     * Get Old Slug
     */
    static function desiredSlug(  $slug=null,$force=false )
    {
        $rows = Site::api(
            path : 'redirect',
            key  : $slug,
            ttl  : '365days',
            force: $force,
            params : [
                'slug'=> $slug,
            ]
        );

        return $rows;
    }

    /**
     * Get menu
     */
    static function reporting($request,$force=false)
    {
        $rows = Site::api(
            path : 'customer-service',
            force : $force,
            method:'post',
            params : $request
        );

        return $rows;
    }

    /**
     * Get List Static Page
     */
    static function listStaticPage(  $force=false )
    {
        $rows = Site::api(
            path : 'static-page',
            key  : 'get-list-static-page',
            ttl  : '60minutes',
            force: $force,
        );

        return $rows;
    }
}
