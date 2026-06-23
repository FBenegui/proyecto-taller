<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser texto.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'unique' => 'El campo :attribute ya existe.',
            'regex' => 'El campo :attribute no puede estar compuesto solo por espacios en blanco.',
        ];

        $attributes = [
            'nombre' => 'nombre del rol',
            'descripcion' => 'descripción',
        ];

        $request->validate([
            'nombre' => 'required|string|min:2|max:255|unique:roles|regex:/\S/',
            'descripcion' => 'nullable|string|max:500|regex:/\S/',
        ], $messages, $attributes);

        Rol::create($request->only(['nombre', 'descripcion']));
        return redirect()->route('roles.index')->with('exito', 'Rol creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('roles.index')->with('exito', 'Rol eliminado exitosamente.');
    }
}
