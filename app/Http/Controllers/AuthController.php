<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class AuthController extends Controller
{
    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request){
        $previousLocale = App::getLocale();
        App::setLocale('es');

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
            'telefono' => 'teléfono',
            'direccion' => 'dirección',
            'codigo_postal' => 'código postal',
            'ciudad' => 'ciudad o provincia',
        ];

        $request->validate([
            'nombre' => 'required|string|min:2|max:255|regex:/\S/',
            'apellido' => 'required|string|min:2|max:255|regex:/\S/',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:8|confirmed',
            'telefono' => 'required|string|min:6|max:20|regex:/\S/',
            'direccion' => 'required|string|min:5|max:255|regex:/\S/',
            'codigo_postal' => 'required|string|min:4|max:20|regex:/\S/',
            'ciudad' => 'required|string|min:2|max:100|regex:/\S/',
        ], $messages, $attributes);

        App::setLocale($previousLocale);

        $clienteRole = Rol::firstOrCreate(
            ['nombre' => 'cliente'],
            ['descripcion' => 'Cliente del ecommerce']
        );

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'codigo_postal' => $request->codigo_postal,
            'ciudad' => $request->ciudad,
            'password' => bcrypt($request->password),
            'rol_id' => $clienteRole->id,
        ]);

        return redirect()->route('login')->with('exito', 'Usuario registrado exitosamente. Por favor inicia sesión.');
    }

    public function autenticar(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $credenciales = $request->only(['email', 'password']);

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            
            // CAMBIO: Accedemos al nombre del rol a través de la relación
            if(Auth::user()->rol->nombre === 'admin'){ 
                return redirect('/admin');
            }
            return redirect('/cliente');
        }
        
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
