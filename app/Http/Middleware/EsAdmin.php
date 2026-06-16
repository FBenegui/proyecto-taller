<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    public function handle(Request $request, Closure $next)
{
    // Verificamos si el usuario está logueado Y si tiene rol de admin
    // (Asegurate que tu tabla users tenga una columna 'role' o 'is_admin')
    if (auth()->check() && auth()->user()->rol === 'admin') {
        return $next($request);
    }

    return redirect('/')->with('error', 'No tenés permisos de administrador.');
}
}
