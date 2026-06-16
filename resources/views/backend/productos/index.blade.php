@extends('layouts.app')

@section('title', 'Gestión de Productos - Cebar Club')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Reutilizamos tu sidebar para no perder la navegación -->
        <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow-sm rounded p-3">
            <h4 class="text-center mb-4">🛠️ Admin Panel</h4>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/ver-panel">📊 Dashboard General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark" href="/productos">📦 Gestión de Productos</a>
                </li>
            </ul>
        </div>

        <!-- Contenido de la Tabla -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Catálogo de Productos</h1>
                <!-- Botón de Alta -->
                <a href="{{ route('productos.create') }}" class="btn btn-success fw-bold">+ Nuevo Producto</a>
            </div>

            <div class="table-responsive shadow-sm rounded">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td class="fw-bold">{{ $producto->nombre }}</td>
                            <td>$ {{ number_format($producto->precio, 2, ',', '.') }}</td>
                            <td>{{ $producto->stock }} un.</td>
                            
                            <!-- Columna Estado Dinámica -->
                            <td>
                                @if($producto->trashed())
                                    <span class="badge bg-danger">Dado de Baja</span>
                                @else
                                    <span class="badge bg-success">Activo</span>
                                @endif
                            </td>
                            
                            <!-- Columna Acciones Dinámica -->
                            <td class="text-center">
                                @if($producto->trashed())
                                    <!-- Botón Restaurar si está dado de baja -->
                                    <form action="{{ route('productos.restore', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info text-white fw-bold">🔄 Restaurar</button>
                                    </form>
                                @else
                                    <!-- Botones normales si está activo -->
                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                    
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que querés dar de baja este producto?')">🗑️ Baja</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection