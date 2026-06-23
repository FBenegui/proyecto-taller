@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="alert alert-warning">
                Esta vista de carrito parece ser un remanente antiguo. El carrito actual se muestra en <a href="{{ route('cliente.carrito') }}">Mi Carrito</a>.
            </div>
            <div class="card p-4">
                <h3 class="mb-3">Ir al carrito</h3>
                <p class="mb-4">Si estás viendo esta página, usa el carrito actual para administrar tus productos y confirmar tu compra.</p>
                <a href="{{ route('cliente.carrito') }}" class="btn btn-mate">Abrir Carrito Actual</a>
            </div>
        </div>
    </div>
</div>
@endsection 