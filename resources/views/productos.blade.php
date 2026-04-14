@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="container mt-5">
        <h1>Productos</h1>
        <p>Aquí encontrarás una variedad de productos relacionados con el mate para disfrutar al máximo tu experiencia.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción breve del producto 1.</p>
                        <a href="#" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
