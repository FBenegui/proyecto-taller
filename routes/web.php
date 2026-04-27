<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

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

