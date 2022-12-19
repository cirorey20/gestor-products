<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin
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
        // dd("Entro", Auth::user()->role);
        if ( Auth::user()->role == 'admin' ) {
            return $next($request);
        } 
        else {
            return redirect('/');
        }
    }
}
