<?php

namespace App\Http\Middleware;

use Closure;

class Cat
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
        echo 'middleawre';
        return $next($request);
    }
}
