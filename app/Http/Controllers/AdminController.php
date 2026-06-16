<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
    public function dashboard() {
        return view('backend.admin.dashboard');
    }

    public function verUsuarios() {
        $usuarios = \App\Models\Usuario::all();
        return view('backend.admin.usuarios.index', compact('usuarios'));
    }

    public function verVentas()
    {
        $ventas = \App\Models\VentaCabecera::all(); // Asegurate de tener el modelo Venta
        return view('backend.admin.ventas.index', compact('ventas'));
    }
}
