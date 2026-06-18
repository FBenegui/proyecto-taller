<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser texto.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'email' => 'El :attribute debe ser un correo electrónico válido.',
            'unique' => 'El :attribute ya ha sido registrado.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'confirmed' => 'La confirmación de :attribute no coincide.',
        ];

        $attributes = [
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
        ];

        $validated = $request->validate([
            'nombre' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string|min:5',
        ], $messages, $attributes);

        // Guardamos el mensaje en la base de datos usando los datos validados
        Contacto::create($validated);

        // Lo devolvemos a la misma página de inicio
        return redirect()->back()->with('success', '¡Mensaje enviado con éxito! Te responderemos pronto.');
    }

    public function index()
    {
        // Traemos todos los mensajes de la base de datos
        $mensajes = \App\Models\Contacto::all();
        return view('backend.mensajes.index', compact('mensajes'));
    }
}