@extends('layouts.admin')

@section('title', 'Panel de Administración - Cebar Club')

@section('content')
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Bienvenido Administrador</h1>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Productos</h5>
                        <h2 class="fw-bold">{{ $totalProductos ?? 0 }}</h2>
                        <a href="{{ route('productos.index') }}" class="btn btn-sm btn-outline-secondary">Ir al Catálogo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Consultas</h5>
                        <h2 class="fw-bold text-danger">{{ $totalConsultas ?? 0 }}</h2>
                        <a href="{{ route('mensajes.index') }}" class="btn btn-sm btn-outline-secondary">Ver Bandeja</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Ventas del Mes</h5>
                        <h2 class="fw-bold text-success">{{ $ventasMes ?? 0 }}</h2>
                        <a href="{{ route('ventas.index') }}" class="btn btn-sm btn-outline-secondary">Ver Ventas</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h4>Actividad Reciente</h4>
            <p class="text-muted">Seleccioná una opción del menú lateral para comenzar a gestionar Cebar Club.</p>
        </div>
    </div>
@endsection