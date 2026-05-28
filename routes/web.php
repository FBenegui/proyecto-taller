<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});
Route::post('/contactanos', [ContactoController::class, 'procesar']);

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/contactanos', function(){
    return view('contactanos');
});

Route::get('/terminos-y-usos', function(){          
    return view('terminos-y-usos');
});

Route::get('/login', [AuthController::class, 'formularioLogin']);
Route::post('/login', [AuthController::class, 'autenticar']);
Route::get('/register', [AuthController::class, 'formularioRegistro']);
Route::post('/register', [AuthController::class, 'registrar']);
Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
});