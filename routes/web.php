<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('/productos', function () {
    return view('productos');
});


