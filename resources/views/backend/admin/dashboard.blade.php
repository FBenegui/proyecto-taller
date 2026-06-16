@extends('layouts.app')

@section('title', 'Panel de Administración - Cebar Club')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        
        <!-- Menú Lateral (Sidebar) -->
        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow-sm rounded p-3">
            <h4 class="text-center mb-4 text-mate">🛠️ Admin Panel</h4>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark" href="/admin">
                        📊 Dashboard General
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('productos.index') }}">
                        📦 Gestión de Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        👥 Usuarios Registrados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        🛒 Historial de Ventas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        ✉️ Bandeja de Consultas
                    </a>
                </li>
            </ul>
            <hr>
            <!-- Botón de Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Cerrar Sesión</button>
            </form>
        </div>

        <!-- Contenido Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bienvenido Administrador</h1>
            </div>

            <!-- Tarjetas de Resumen -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-left-mate">
                        <div class="card-body">
                            <h5 class="card-title">Total Productos</h5>
                            <h2 class="fw-bold">--</h2>
                            <a href="{{ route('productos.index') }}" class="btn btn-sm btn-outline-secondary">Ir al Catálogo</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-left-mate">
                        <div class="card-body">
                            <h5 class="card-title">Consultas sin leer</h5>
                            <h2 class="fw-bold text-danger">--</h2>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Ver Bandeja</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-left-mate">
                        <div class="card-body">
                            <h5 class="card-title">Ventas del Mes</h5>
                            <h2 class="fw-bold text-success">--</h2>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Ver Ventas</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acá más adelante cargaremos las tablas según donde haga clic el admin -->
            <div class="mt-4">
                <h4>Actividad Reciente</h4>
                <p class="text-muted">Seleccioná una opción del menú lateral para comenzar a gestionar Cebar Club.</p>
            </div>
            
        </main>
    </div>
</div>
@endsection