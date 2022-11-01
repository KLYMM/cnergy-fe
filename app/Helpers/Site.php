<?php

namespace App\Helpers;

use Http, Cache, Str;

class Site {

    /**
     * View base on namespace and user agent
     */
    static function view( $path, $params=[] )
    {
         // dd(config('site'));
        $path = config('site.path', 'defaultsite', )
          .'.'. config('site.device', 'mobile-v2')
          .'.'. $path;
        return view($path, $params);
    }

    /**
     * Build keywords from description
     */
    static function keywords( $desc )
    {
        $desc = Str::slug($desc);

        $strings = explode('-', $desc);

        $strings = array_unique($strings);

        $strings = array_filter($strings);

        return implode(', ', $strings);
    }


    /**
     * get data from API base on token domain
     */
    static function remote( $path, $params=[], $method='get' )
    {
        if ($method=='get')
        {
            $url = config('app.api_url')
                . '/'. $path
                . '/&token='
                . config('site.token')
                . '&'. http_build_query($params);
            try
            {
                $body = Http::withoutVerifying()->retry(3, 15)->get($url);

                return $body->json();

            }
            catch(\Illuminate\Http\Client\ConnectionException $e)
            {
                \Log::info('Connection timeout');

                return null;
            }
            catch(\Illuminate\Http\Client\RequestException $e)
            {
                \Log::info('Invalid request');

                return null;
            }
        }
        elseif ($method=='post')
        {
            $url = config('app.api_url')
                . '/'. $path
                . '/&token='
                . config('site.token');
            try
            {

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

                // execute!
                $response = curl_exec($ch);

                // close the connection, release resources used
                curl_close($ch);

                return $response;
            }
            catch(\Illuminate\Http\Client\ConnectionException $e)
            {
                \Log::info('Connection timeout');

                return null;
            }
            catch(\Illuminate\Http\Client\RequestException $e)
            {
                \Log::info('Invalid request');

                return null;
            }
        }

    }

    /**
     * DATA RES API
     * @param $path (string) Api path endpoint
     * @param $fields (array) field only show from the result
     * @param $deep (int) field result 1: array 1 dimention, 2: array 2 dimention
     * @param $params (array) parameter API
     * @param $key (string) unique cache key
     * @param $ttl (string) time to life renewable result
     * @param $tags (array) to grouping cache
     * @param $force (boolean) to force renewable
     */
    static function api( $path, $fields='*', $deep=1, $params=[], $key=null, $ttl='5minutes', $tags=[], $force=false, $method='get' )
    {
        if(!$key)
        {
            $key = $path . '_' . md5(json_encode($params));
        }

        $collection = Cache::tags($tags)->get($key);

        if( !$collection || ( ($collection['created_at']??0) < strtotime('-'.$ttl)  ) || $force )
        {
            $result = Site::remote( $path, $params, $method );

            if ($method=='get') {
            //MAPPING
            $items = $fields == '*' ? collect($result) : collect($result)->map(function ($item) use($fields, $deep) {

                if( $deep == 1 )
                {
                    return collect($item)->only($fields);
                }
                elseif( $deep == 2 )
                {
                    return collect($item)->map(function ($item) use($fields) {
                        return collect($item)->only($fields);
                    });
                }
            });

            //success retrieve data and save to collection
            if( $items )
            {
                $collection = collect([
                    'created_at'=> time(),
                    'data'=> $items
                ])
                ->toArray();

                Cache::tags($tags)->forever($key, $collection);
            }
            }
            elseif ($method=='post') {
                return $result;
            }
        }

        return $collection['data'] ?? null;
    }

    static function isMobile()
    {
        return config('site.device') == 'mobile-v2' ? true : false;
    }
}
