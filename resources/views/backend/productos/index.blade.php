@extends('layouts.admin')

@section('title', 'Gestión de Productos - Cebar Club')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center pt-4 pb-3">
        <h1 class="h3 text-dark fw-bold">Catálogo de Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn text-white fw-bold shadow-sm" style="background-color: #73a85e;">
            <i class="bi bi-plus-lg"></i> + Nuevo Producto
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: rgba(115, 168, 94, 0.15);">
                        <tr>
                            <th class="ps-4">ID</th>
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
                            <td class="ps-4 text-muted">{{ $producto->id }}</td>
                            <td class="fw-bold">{{ $producto->nombre }}</td>
                            <td>$ {{ number_format($producto->precio, 2, ',', '.') }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $producto->stock }} un.</span></td>
                            <td>
                                @if($producto->trashed())
                                    <span class="badge rounded-pill bg-danger-subtle text-danger">Dado de Baja</span>
                                @else
                                    <span class="badge rounded-pill text-white" style="background-color: #73a85e;">Activo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($producto->trashed())
                                    <form action="{{ route('productos.restore', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-info btn-table">🔄 Restaurar</button>
                                    </form>
                                @else
                                    <div class="table-actions">
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-outline-warning btn-table">✏️ Editar</a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-table" onclick="return confirm('¿Confirmar baja?')">🗑️ Baja</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection