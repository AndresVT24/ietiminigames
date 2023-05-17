<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->rol == 2) {
            return $next($request);
        }

        abort(403, 'Acceso denegado.'); // Devuelve un error 403 si el usuario no tiene el rol 1 (admin)
    }
}