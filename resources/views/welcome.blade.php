@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div id="carouselExampleInterval" class="carousel slide mx-auto" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000" style="height: 600px;">
            <img src="{{ asset('imagenes/carrousel1.png') }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="Nunca es mal momento para compartir un mate">
        </div>
        <div class="carousel-item" data-bs-interval="5000" style="height: 600px;">
            <img src="{{ asset('imagenes/carrousel2.png') }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="productos">
        </div>
        <div class="carousel-item" data-bs-interval="5000" style="height: 600px;">
            <img src="{{ asset('imagenes/carrousel3.png') }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="Mate">
        </div>
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</div>
<div class="container">
    <div>
    <h1>Bienvenidos a Cebar Club</h1>
    <p style="font-size: 1.25rem; color: #6c757d;">La compania de tu mate.</p>
    </div>
    <div>
        
</div>
@endsection
