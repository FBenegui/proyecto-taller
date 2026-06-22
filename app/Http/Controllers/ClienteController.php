<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VentaCabecera;

use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function compras()
    {
        $userId = Auth::id();
        $compras = VentaCabecera::where('user_id', $userId)
                    ->where('estado', '<>', 'carrito')
                    ->with('detalles.producto')
                    ->orderByDesc('fecha_venta')
                    ->get();

        return view('cliente.compras', compact('compras'));
    }

    public function compraDetalle($id)
    {
        $userId = Auth::id();
        $compra = VentaCabecera::where('id', $id)
                    ->where('user_id', $userId)
                    ->with('detalles.producto')
                    ->firstOrFail();

        return view('cliente.compra-detalle', compact('compra'));
    }
}
