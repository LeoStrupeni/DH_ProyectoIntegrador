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
        if (Auth::check() && auth()->user()->hasRole('admin')) {
            return $next($request);
        } else {
            notify()->error('No tenes los permisos necesarios para acceder', 'Error', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);
            return redirect('/')->with('error', 'No tenes acceso Admin');
        }
    }
}
