<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VarnishCache
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $ttl)
    {
        $response = $next($request);
        
        $response->header('X-Varnish-TTL', $ttl.'m');
        
        return $response;
    }
}
