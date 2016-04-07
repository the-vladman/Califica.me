<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BecarioMiddleware
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
        $user = Auth::user();
        if ($user->rol == 'becario') {
            return $next($request);
        } 
        else {
            return response('PROHIBIDO EL PASO.', 401);
            }
    }
}
