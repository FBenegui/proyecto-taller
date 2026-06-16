@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="display-5 fw-bold">Nuestros <span class="text-mate">Productos</span></h1>
                <p class="lead text-muted">Selección premium de mates, yerbas y accesorios para el cebador exigente.</p>
                <hr class="w-25 mx-auto border-mate opacity-75" style="border-width: 3px;">
            </div>
        </div>

        @php
            $items = $productos ?? collect([
                (object)[ 'id' => 0, 'nombre' => 'Mate Imperial Premium', 'descripcion' => 'Calabaza seleccionada forrada en cuero vaqueta con virola de alpaca cincelada.', 'precio' => 25900, 'stock' => 10, 'url_imagen' => 'imagenes/mate-imperial.jpg' ],
                (object)[ 'id' => 0, 'nombre' => 'Mate Algarrobo', 'descripcion' => 'Fabricado en madera de algarrobo seleccionada, este mate destaca por su durabilidad y el aroma único que le aporta a cada cebada.', 'precio' => 22500, 'stock' => 5, 'url_imagen' => 'imagenes/mate-algarrobo.jpg' ],
                (object)[ 'id' => 0, 'nombre' => 'Mate Camionero', 'descripcion' => 'Un mate de gran tamaño, forrado en cuero legítimo de alta calidad con costuras reforzadas.', 'precio' => 20500, 'stock' => 3, 'url_imagen' => 'imagenes/mate-camionero.jpeg' ],
                (object)[ 'id' => 0, 'nombre' => 'Yerba Mate Cosmico 1kg', 'descripcion' => 'Yerba mate de molienda equilibrada y estacionamiento natural.', 'precio' => 4500, 'stock' => 20, 'url_imagen' => 'imagenes/cosmico-yerba.jpg' ],
                (object)[ 'id' => 0, 'nombre' => 'Canasta Matera', 'descripcion' => 'Confeccionada artesanalmente en cuero vacuno de exportación.', 'precio' => 40299, 'stock' => 2, 'url_imagen' => 'imagenes/canasta-matera.jpg' ],
                (object)[ 'id' => 0, 'nombre' => 'Bombilla de Alpaca', 'descripcion' => 'Modelo pico de loro con filtro desarmable para fácil limpieza.', 'precio' => 30200, 'stock' => 8, 'url_imagen' => 'imagenes/bombilla-alpaca.jpg' ],
            ]);

            $userRole = auth()->user()->rol ?? null;
            $isAdmin = false;
            if ($userRole) {
                if (is_string($userRole)) {
                    $isAdmin = $userRole === 'admin';
                } elseif (is_object($userRole) && property_exists($userRole, 'nombre')) {
                    $isAdmin = $userRole->nombre === 'admin';
                }
            }
        @endphp

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($items as $producto)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset($producto->url_imagen) }}" class="card-img-top p-3 rounded-4" alt="{{ $producto->nombre }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted small flex-grow-1">{{ $producto->descripcion }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        @auth
                            @if(!$isAdmin)
                                <form method="POST" action="{{ route('carrito.agregar') }}">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                    <input type="hidden" name="cantidad" value="1">
                                    <button type="submit" class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                                </form>
                            @else
                                <a href="{{ route('productos.index') }}" class="btn btn-secondary w-100">Gestionar producto</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-mate w-100 fw-bold">Iniciar sesión para comprar</a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
