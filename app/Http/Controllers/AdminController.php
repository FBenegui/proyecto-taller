<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
    public function dashboard() {
        $totalProductos = \App\Models\Producto::count();
        $totalConsultas = \App\Models\Contacto::count();
        $ventasMes = \App\Models\VentaCabecera::whereMonth('fecha_venta', now()->month)->whereYear('fecha_venta', now()->year)->count();

        return view('backend.admin.dashboard', compact('totalProductos', 'totalConsultas', 'ventasMes'));
    }

    public function verUsuarios() {
        $usuarios = \App\Models\Usuario::with('rol')->get();
        return view('backend.admin.usuarios.index', compact('usuarios'));
    }

    public function usuarioVentas($id)
    {
        $usuario = \App\Models\Usuario::with('ventas.detalles.producto')->findOrFail($id);
        $ventas = $usuario->ventas ?? collect();

        return view('backend.admin.ventas.historial', compact('usuario', 'ventas'));
    }

    public function verVentas()
    {
        $ventas = \App\Models\VentaCabecera::with('usuario')->get();
        return view('backend.admin.ventas.index', compact('ventas'));
    }

    public function ventaDetalle($id)
    {
        $compra = \App\Models\VentaCabecera::where('id', $id)
                    ->with('detalles.producto', 'usuario')
                    ->firstOrFail();

        return view('backend.admin.ventas.detalle', compact('compra'));
    }
}
