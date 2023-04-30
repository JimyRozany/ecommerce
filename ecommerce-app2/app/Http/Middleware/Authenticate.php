<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate 
// extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }

    public function handle(Request $request, Closure $next ,$guard = null): Response
    {
        $guard = $guard == null ? 'user' : $guard ;

        if(!auth($guard)->check())
        {
            if($guard == "user")
            {
                return redirect('login');
            }
            return redirect($guard . '/login');
        }
        return $next($request);
    }
}
