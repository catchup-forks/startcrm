<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::check() && Auth::user()->is_admin)
        {
            return $next($request);
        }

        \Session::flash('message', 'You are not authorised to access the Admin Panel');
        \Session::flash('class', 'danger');
        return redirect('home');
    }
}
