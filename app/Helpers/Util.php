<?php

namespace App\Helpers;

use Http, Cache, Str;

class Util {

    /**
     * Format Date
     */
    static function date( $date, $format )
    {
        $d = date("d", strtotime($date));
        $m = date("M", strtotime($date));
        $n = date("m", strtotime($date));
        $y = date("Y", strtotime($date));
        $h = date("H", strtotime($date));
        $i = date("i", strtotime($date));
        $s = date("s", strtotime($date));
        

        return match ($format) 
        {
           'ago'  => self::time_elapsed_string($date),

           'short' => sprintf('%s %s %d',__('global.month_short.'.$m), $d, $y),

           'long'  => sprintf('%s %s %d',__('global.month_short.'.$m), $d, $y),
           
           'time'  => sprintf('%s:%s WIB', $h, $i),

           'short_time'  => sprintf('%s %s %d, %s:%s WIB', __('global.month_short.'.$m), $d, $y, $h, $i),

           'long_time'   => sprintf('%s %s %d, %s:%s WIB',__('global.month_long.'.$m), $d, $y, $h, $i),           
           'default_date' => sprintf('%s-%s-%s',$y, $n, $d),           
           'default_hour' => sprintf('%s:%s:%s',$h, $i, $s),           
        };
    }

    static function time_elapsed_string($ptime)
    {
        $etime = time() - strtotime($ptime);

        if ($etime < 1)
        {
            return __('just moment');
        }

        $a = [  
            365 * 24 * 60 * 60  =>  'year',
             30 * 24 * 60 * 60  =>  'month',
                  24 * 60 * 60  =>  'day',
                       60 * 60  =>  'hour',
                            60  =>  'minute',
                             1  =>  'second'
        ];
        $a_plural = [   
            'year'   => 'years',
            'month'  => 'months',
            'day'    => 'days',
            'hour'   => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        ];

        foreach ($a as $secs => $str)
        {
            $d = $etime / $secs;

            if ($d >= 1)
            {
                $r = round($d);

                if( $r.$str == '1day' )
                {
                    return ucwords(__('yesterday')).' '.__('attime').' '.self::date($ptime, 'time');
                }
                elseif( $etime > (60 * 60 * 24 * 1) )
                {
                    return self::date($ptime, 'short_time');
                }
                else return $r . ' ' . __($r > 1 ? $a_plural[$str] : $str) . ' '.__('ago');
            }
        }
    }

    /**
     * GET NEWS MAX ID FROM LISTS
     */
    static function getNewsMaxId($rows)
    {
        $last = $rows ? end($rows) : null;

        return $last['news_id'] ?? null;
    }

    /**
     * GET NEWS EXCLUDE ID FROM LISTS
     */
    static function getNewsExId($rows)
    {
        if( !$rows ) return null;

        $ids = collect($rows)->pluck('news_id')->toArray();
        
        return implode(',', $ids);
    }

    /**
     * GET PAGINATION
     */
    static function pagination( $page=1,$last_page=null )
    {
        
        $limit=Site::isMobile()?4:9;
        $page = $page==null?1:$page;
        $last_page = $last_page==null?INF:$last_page;
        $pagination=[];
        $p_back=(int)$page;
        $p_next=(int)$page+1;

        //list page behind index
        for ($i=0; $i < ($limit-1) ; $i++) { 
            $pagination['list'][$i]['page'] = $p_back;
            $p_back=$p_back-1;
            if ($p_back<1) {
                break;
            }
        }
        $count=count($pagination['list']);
        //list page after index
        for ($i=$count; $i < $limit ; $i++) {  
            if ($p_next>$last_page) {
                break;
            }
            $pagination['list'][$i]['page'] = $p_next;
            $p_next=$p_next+1;
        }
        $count=count($pagination['list']);
        $col = array_column( $pagination['list'], "page" );
        array_multisort( $col, SORT_ASC, $pagination['list'] );

        //check page count 
        if ($count<$limit&&$last_page>=$limit) {
            for ($i=$count; $i < $limit ; $i++) {  
                $pagination['list'][$i]['page'] = $p_back;
                $p_back=$p_back-1;
                if ($p_back<1) {
                    break;
                }
            }
        }

        $col = array_column( $pagination['list'], "page" );
        array_multisort( $col, SORT_ASC, $pagination['list'] );
        $pagination['current_page']=$page;
        $pagination['last_page']=$last_page==INF?$page:$last_page;

        return $pagination;
    }

    /**
     * GET DOMAIN NAME
     */
    static function getDomain($url)
    {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : '';
        if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
            return $regs['domain'];
        }
        return FALSE;
    }

    /**
     * GET Ads
     */
    static function getAds($name)
    {
        if(!config('app.enabled_ads')) return false;
        
        return  str_replace(["\n", "\r"], "", config('site.ads')[$name] ?? '');
    }
}