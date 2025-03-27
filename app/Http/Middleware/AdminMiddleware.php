<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        dd('Middleware admin está funcionando'); // Verifica si se imprime el mensaje

        if (!Auth::check() || Auth::user()->role !== 'administrador') {
            abort(403, 'Acceso denegado.');
        }

        return $next($request);
    }
}