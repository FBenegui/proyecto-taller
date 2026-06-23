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
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'regex' => 'El campo :attribute no puede estar compuesto solo por espacios en blanco.',
        ];

        $attributes = [
            'nombre' => 'nombre',
            'email' => 'correo electrónico',
            'mensaje' => 'mensaje',
        ];

        $validated = $request->validate([
            'nombre' => 'required|string|min:2|max:255|regex:/\S/',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string|min:10|max:1000|regex:/\S/',
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