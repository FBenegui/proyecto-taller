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

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset('imagenes/mate-imperial.jpg') }}" class="card-img-top p-3 rounded-4" alt="Mate Imperial">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                        <p class="card-text text-muted small flex-grow-1">Calabaza seleccionada forrada en cuero vaqueta con virola de alpaca cincelada.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">$25.900</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset('imagenes/mate-algarrobo.jpg') }}" class="card-img-top p-3 rounded-4" alt="Mate Algarrobo">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Mate Algarrobo</h5>
                        <p class="card-text text-muted small flex-grow-1">Fabricado en madera de algarrobo seleccionada, este mate destaca por su durabilidad y el aroma único que le aporta a cada cebada.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">$22.500</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset('imagenes/mate-camionero.jpeg') }}" class="card-img-top p-3 rounded-4" alt="Mate Camionero">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Mate Camionero</h5>
                        <p class="card-text text-muted small flex-grow-1">Un mate de gran tamaño, forrado en cuero legítimo de alta calidad con costuras reforzadas.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">$20.500</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset('imagenes/cosmico-yerba.jpg') }}" class="card-img-top p-3 rounded-4" alt="Yerba Mate Cosmico">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Yerba Mate Cosmico 1kg</h5>
                        <p class="card-text text-muted small flex-grow-1">Yerba mate de molienda equilibrada y estacionamiento natural. Su sabor intenso pero persistente garantiza rondas largas sin lavarse.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">$4.500</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset('imagenes/canasta-matera.jpg') }}" class="card-img-top p-3 rounded-4" alt="Canasta Matera">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Canasta Matera</h5>
                        <p class="card-text text-muted small flex-grow-1">Confeccionada artesanalmente en cuero vacuno de exportación, esta canasta es la aliada definitiva para el matero viajero. Su estructura reforzada y costuras de alta resistencia aseguran durabilidad, mientras que su diseño ergonómico permite organizar el termo, el mate y la yerbera de forma segura y cómoda. Un accesorio que combina elegancia rústica y practicidad absoluta.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">$40.299</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="{{ asset('imagenes/bombilla-alpaca.jpg') }}" class="card-img-top p-3 rounded-4" alt="Bombilla">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Bombilla de Alpaca</h5>
                        <p class="card-text text-muted small flex-grow-1">Modelo pico de loro con filtro desarmable para fácil limpieza. Fabricada en alpaca de primera calidad, esta bombilla no solo es estéticamente superior, sino que garantiza una excelente disipación del calor para no quemarse.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fs-4 fw-bold text-mate">$30.200</span>
                            <a href="#" class="btn btn-outline-mate btn-sm px-3">Ver detalles</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-mate w-100 fw-bold">Agregar al carrito</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
