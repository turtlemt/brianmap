<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuth
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
        echo 'middle';
        return $next($request);
        /*if ('127.0.0.1' == $request->ip())
            return $next($request);
        else
            exit;*/
    }
}
