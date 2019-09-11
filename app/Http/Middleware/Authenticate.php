<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            notify()->error('Debe estar logueado para poder proceder con la compra', 'Error', ["closeButton" => true, "positionClass" => "toast-bottom-right"]);
            return route('search');
        }
    }
}
