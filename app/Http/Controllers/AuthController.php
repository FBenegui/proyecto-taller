<?php

namespace App\Http\Controllers;

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
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    public function autenticar(Request $request){
        $credenciales = $request->only(['email', 'password']);

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            if(Auth::user()->rol_id === 'admin'){
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
