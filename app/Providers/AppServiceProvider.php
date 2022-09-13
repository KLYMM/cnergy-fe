<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $scheme = 'http';
        
        if( config('app.env') != 'local' )
        {
            //get attributes data from domain setting
            $attrSite = json_decode(config('site.attributes.reldomain.additional_data') ?? '[]', TRUE);
            
            $allowHttp = ($attrSite['allow_http'] ?? null) ?  true : false;
            
            if(!$allowHttp) 
            {
                $scheme = 'https';
            }
            else
            {
                \Config::set('app.env', 'development');
            }
        }

        \URL::forceScheme($scheme);
    }
}
