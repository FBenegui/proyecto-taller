<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        // Guardamos el mensaje en la base de datos
        Contacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        // Lo devolvemos a la misma página de inicio
        return redirect()->back()->with('success', '¡Mensaje enviado con éxito! Te responderemos pronto.');
    }
}