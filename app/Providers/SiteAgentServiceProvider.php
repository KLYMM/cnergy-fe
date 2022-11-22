<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Cache;

class SiteAgentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //define host / main domain
        config()->set('site.host', request()->getHost());

        //valet
        if( config('app.env')=='local' && !request()->getHost() )
        {
            config()->set('site.host', 'localhost');
        }

        //get config domain
        $domain = $this->_findDomainConfig();

        if( !($domain['namespace'] ?? null) ) return abort(404);

        //Varnish user Agent
        if(request()->header('X-Device'))
        {
            //define device mobile / desktop
            config()->set('site.device', request()->header('X-Device') == 'pc' ? 'desktop' : 'mobile');
        }
        else
        {
            //get agent
            $agent = new Agent();

            //define device mobile / desktop
            config()->set('site.device', $agent->isMobile() ? 'mobile-v2' : 'desktop');
        }

        config()->set('site.device', 'mobile-v2');

        //define site path
        config()->set('site.path', Str::slug($domain['namespace'] ?? 'default'));

        //define site namespace
        config()->set('site.namespace', $domain['namespace'] ?? null);

        //define site route
        config()->set('site.route', $domain['route'] ?? null);

        //define token form domain config
        config()->set('site.token', $domain['token'] ?? null);

        //define attributes frontend setting
        config()->set('site.attributes', (\Site::api(path: 'fe-setting', tags: ['global'])['data']??null));

        //define is AMP
        config()->set('site.is_amp', request()->segment(1) == 'amp' ? true : false);

        //define ads
        config()->set('site.ads', collect(
            \Site::api( path : 'inventory', ttl: '15minutes', tags:['global', 'inventory'])['data']??null)->where('type', config('site.is_amp') ? 'amp' : config('site.device'))
            ->pluck('code', 'inventory')
            ->mapWithKeys(function($v, $k){
                return [
                    \Str::slug($k) => $v
                ];
            })->toArray()
        );
    }

    private function _findDomainConfig()
    {
        $cacheKey = 'siteFoundDomain_'.config('site.host');

        $cacheSecond = 1;

        return Cache::remember($cacheKey, $cacheSecond, function () {

            foreach( config( 'domain' ) as $d )
            {
                if( in_array( config('site.host'), $d['domains'] ) )
                {
                    return $d;
                }
            }
        });
    }
}
