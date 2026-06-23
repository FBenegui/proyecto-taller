<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contacto;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\VentaCabecera;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layouts.admin', function ($view) {
            $totalProductos = Producto::count();
            $totalUsuarios = Usuario::count();
            $totalConsultas = Contacto::count();
            $ventasMes = VentaCabecera::whereMonth('fecha_venta', now()->month)
                ->whereYear('fecha_venta', now()->year)
                ->count();

            $view->with(compact('totalProductos', 'totalUsuarios', 'totalConsultas', 'ventasMes'));
        });
    }
}
