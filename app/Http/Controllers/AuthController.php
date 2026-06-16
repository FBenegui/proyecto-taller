<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $clienteRole = Rol::firstOrCreate(
            ['nombre' => 'cliente'],
            ['descripcion' => 'Cliente del ecommerce']
        );

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol_id' => $clienteRole->id,
        ]);

        return redirect()->route('login')->with('exito', 'Usuario registrado exitosamente. Por favor inicia sesión.');
    }

    public function autenticar(Request $request){
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
