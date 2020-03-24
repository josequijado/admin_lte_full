<?php

namespace App\Http\Middleware;

use Closure;

class JustAdmins
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
        if (auth()->user()->role == 'User') {
            return redirect(route('main_user'));
        }
        return $next($request);
    }
}
