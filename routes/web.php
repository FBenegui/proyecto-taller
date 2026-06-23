<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    $productosDestacados = Producto::join('ventas_detalle', 'productos.id', '=', 'ventas_detalle.producto_id')
        ->select('productos.*', DB::raw('SUM(ventas_detalle.cantidad) as total_vendido'))
        ->where('productos.activo', true)
        ->groupBy('productos.id')
        ->orderByDesc('total_vendido')
        ->take(3)
        ->get();

    if ($productosDestacados->isEmpty()) {
        $productosDestacados = Producto::where('activo', true)
            ->orderByDesc('id')
            ->take(3)
            ->get();
    }

    return view('inicio', compact('productosDestacados'));
});
Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});
Route::post('/contactanos', [ContactoController::class, 'procesar']);

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/contactanos', function(){
    return view('contactanos');
});

Route::get('/terminos-y-usos', function(){          
    return view('terminos-y-usos');
});

Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar']);
Route::get('/registrar', [AuthController::class, 'formularioRegistro'])->name('registro');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::get('/formRegistro', function () {
    return redirect()->route('registro');
});
Route::post('/formRegistro', function () {
    return redirect()->route('registrar');
});
Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
});

Route::resource('productos', productoController::class)->except(['show']);
Route::put('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');

Route::middleware(['auth', 'rol:cliente'])->group(function () {
    //mostrar carrito
    Route::get('/carrito', [CarritoController::class, 'index'])
                            ->name('cliente.carrito');
    //agregar producto al carrito
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])
                                    ->name('carrito.agregar');
    // vaciar carrito
    Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
    // incrementar cantidad de un item
    Route::post('/carrito/{id}/incrementar', [CarritoController::class, 'incrementar'])->name('carrito.incrementar');
    Route::post('/carrito/{id}/decrementar', [CarritoController::class, 'decrementar'])->name('carrito.decrementar');
    Route::post('/carrito/{id}/cantidad', [CarritoController::class, 'actualizarCantidad'])->name('carrito.actualizar');
    //Eliminar producto
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])
                                            ->name('carrito.eliminar');
    // Confirmar compra
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])
                                        ->name('carrito.confirmar');
    //Vista de compra confirmada (protegida: redirige si no hay sesión) 
    Route::get('/compra-confirmada', function () { 
        if(!session('total'))  {
            return redirect()->route('cliente.inicio');
            }     
        return view('backend.usuarios.compra-confirmada');     
    })->name('compra.confirmada');

    // Historial de compras del cliente
    Route::get('/cliente/compras', [\App\Http\Controllers\ClienteController::class, 'compras'])->name('cliente.compras');
    Route::get('/cliente/compras/{id}', [\App\Http\Controllers\ClienteController::class, 'compraDetalle'])->name('cliente.compras.show');
});


Route::get('/ver-panel', function () {
    return view('backend.admin.dashboard');
});

Route::get('/productos', [productoController::class, 'index'])->name('productos.index');

// Página por categoría (SEO-friendly)
// Nota: la ruta antigua /productos/categoria/{slug} redirige a la nueva
Route::get('/productos/categoria/{slug}', function ($slug) {
    return redirect()->route('productos.categoria', $slug);
});

// SEO-friendly: /productos/{slug}
// Esta ruta debe quedar después de las rutas más específicas (crear, editar, etc.)
Route::get('/productos/{slug}', [productoController::class, 'categoria'])->name('productos.categoria');

// Detalle de producto (evita conflicto con /productos/{slug})
Route::get('/producto/{id}', [productoController::class, 'show'])->name('producto.show');
Route::get('/producto/modal/{id}', [productoController::class, 'modal'])->name('producto.modal');

Route::delete('/productos/{producto}', [App\Http\Controllers\productoController::class, 'destroy'])->name('productos.destroy');

Route::get('/productos/crear', [App\Http\Controllers\productoController::class, 'create'])->name('productos.create');

Route::post('/productos/guardar', [App\Http\Controllers\productoController::class, 'store'])->name('productos.store');

Route::post('/productos/{id}/restore', [App\Http\Controllers\productoController::class, 'restore'])->name('productos.restore');

Route::get('/productos/{id}/editar', [App\Http\Controllers\productoController::class, 'edit'])->name('productos.edit');

Route::put('/productos/{id}', [App\Http\Controllers\productoController::class, 'update'])->name('productos.update');

Route::post('/contacto/enviar', [App\Http\Controllers\ContactoController::class, 'store'])->name('contacto.store');

Route::get('/mensajes', [App\Http\Controllers\ContactoController::class, 'index'])->name('mensajes.index');

Route::get('/usuarios', [App\Http\Controllers\AdminController::class, 'verUsuarios'])
    ->name('usuarios.index')
    ->middleware(['auth', 'rol:admin']);

Route::get('/admin/usuarios/{id}/ventas', [App\Http\Controllers\AdminController::class, 'usuarioVentas'])
    ->name('usuarios.ventas')
    ->middleware(['auth', 'rol:admin']);

Route::get('/admin/ventas', [App\Http\Controllers\AdminController::class, 'verVentas'])
    ->name('ventas.index')
    ->middleware(['auth', 'rol:admin']);

Route::get('/admin/ventas/{id}', [App\Http\Controllers\AdminController::class, 'ventaDetalle'])
    ->name('ventas.show')
    ->middleware(['auth', 'rol:admin']);

Route::middleware(['auth'])->group(function () {
    Route::get('/cliente', function () {
        return view('cliente.inicio');
    })->name('cliente.inicio');
});