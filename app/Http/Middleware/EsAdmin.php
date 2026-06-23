<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    public function handle(Request $request, Closure $next)
{
    // Verificamos si el usuario está logueado y tiene rol de admin
    if (auth()->check()) {
        $user = auth()->user();
        $userRole = $user->rol ?? null;
        $isAdmin = false;

        if ($userRole) {
            if (is_string($userRole)) {
                $isAdmin = $userRole === 'admin';
            } elseif (is_object($userRole) && isset($userRole->nombre)) {
                $isAdmin = $userRole->nombre === 'admin';
            }
        }

        if ($isAdmin) {
            return $next($request);
        }
    }

    return redirect('/')->with('error', 'No tenés permisos de administrador.');
}
}
