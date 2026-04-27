@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div id="carouselInicio" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselInicio" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carouselInicio" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselInicio" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active hero-slide" data-bs-interval="5000">
            <img src="{{ asset('imagenes/carrousel1.png') }}" class="d-block w-100 hero-img" alt="Mate principal">
        </div>
        <div class="carousel-item hero-slide" data-bs-interval="5000">
            <img src="{{ asset('imagenes/carrousel2.png') }}" class="d-block w-100 hero-img" alt="Accesorios">
        </div>
        <div class="carousel-item hero-slide" data-bs-interval="5000">
            <img src="{{ asset('imagenes/carrousel3.png') }}" class="d-block w-100 hero-img" alt="Yerba">
        </div>
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselInicio" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselInicio" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<div class="container mt-5 pt-4 text-center">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <span class="text-uppercase fw-bold" style="color: var(--verde-mate); letter-spacing: 2px; font-size: 0.9rem;">Tu punto de encuentro</span>
            <h1 class="display-5 fw-bold text-dark mt-2">Bienvenidos a Cebar <span class="text-mate">Club</span></h1>
            <p class="lead text-muted mt-3">
                Más que una tienda, somos el espacio para quienes entienden que un buen mate es indispensable. Ya sea para arrancar la mañana con fuerza o para recuperar energías después de un día intenso, acá vas a encontrar la calidad que buscás.
            </p>
            <hr class="w-25 mx-auto border-mate opacity-75 mt-4 mb-5" style="border-width: 3px;">
        </div>
    </div>
</div>

<div class="container mb-5 pb-4">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="fw-bold m-0">Productos <span class="text-mate">Destacados</span></h3>
        <a href="/productos" class="text-decoration-none fw-bold" style="color: var(--verde-mate);">Ver todos &rarr;</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        
        <div class="col">
            <div class="card h-100 border-0 shadow-sm producto-card">
                <img src="{{ asset('imagenes/mate-imperial.jpg') }}" class="card-img-top p-3 rounded-4" alt="Mate Imperial">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Mate Imperial Premium</h5>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="fs-5 fw-bold text-mate">$25.900</span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <button class="btn btn-outline-mate w-100 fw-bold">Ver producto</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm producto-card">
                <img src="{{ asset('imagenes/canasta-matera.jpg') }}" class="card-img-top p-3 rounded-4" alt="Canasta Matera">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Canasta Matera de Cuero</h5>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="fs-5 fw-bold text-mate">$40.299</span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <button class="btn btn-outline-mate w-100 fw-bold">Ver producto</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm producto-card">
                <img src="{{ asset('imagenes/bombilla-alpaca.jpg') }}" class="card-img-top p-3 rounded-4" alt="Bombilla">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">Bombilla de Alpaca</h5>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="fs-5 fw-bold text-mate">$30.200</span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pb-3">
                    <button class="btn btn-outline-mate w-100 fw-bold">Ver producto</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
