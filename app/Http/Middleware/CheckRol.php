<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRol
{
    /**
     * Handle an incoming request.
     * Expect a role name as parameter, e.g. `rol:admin`.
     */
    public function handle(Request $request, Closure $next, $rol = null)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // If no role param provided, allow access
        if (!$rol) {
            return $next($request);
        }

        // If user has relation `rol` (model) and `nombre`, compare
        if (method_exists($user, 'rol') && $user->rol && $user->rol->nombre === $rol) {
            return $next($request);
        }

        // Allow access for visitors (guest) if role param is 'visitante'
        if ($rol === 'visitante' && !$user) {
            return $next($request);
        }

        abort(403);
    }
}
