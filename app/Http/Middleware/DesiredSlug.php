<?php

namespace App\Http\Middleware;

use Closure;
use Data, Src;
use Illuminate\Http\Request;

class DesiredSlug
{
    /**
     * Handle a redirect old slug.
     */
    public function handle($request, Closure $next)
    {
        //search wordpress
        if( request('s') )
        {
            return redirect(url('/search?q='.strip_tags(request('s'))), 301);
        }
        else
        {
            $slug = $request->segment(1);
            $isRead = $request->segment(2);
            
            if( !in_array($slug, ['sst']) && $isRead!='read')
            {
                $row = Data::desiredSlug($slug);

                if( $row )
                {
                    $url = Src::detail($row);

                    if( $url ) return redirect($url, 301);
                }
            }
        }

        return $next($request); 
    }
}
