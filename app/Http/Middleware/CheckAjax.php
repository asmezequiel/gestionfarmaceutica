<?php

namespace App\Http\Middleware;

use Closure;

class CheckAjax
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
        if(!$request->ajax()) { return abort(403,"esto no es ajaaaax!"); }
        return $next($request);
    }
}
