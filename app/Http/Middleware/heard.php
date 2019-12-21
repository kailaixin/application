<?php

namespace App\Http\Middleware;

use Closure;

class heard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin:*"); //跨域权限设置，允许所有
        return $next($request);
    }
}
