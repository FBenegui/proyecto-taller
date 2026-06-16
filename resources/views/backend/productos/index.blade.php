@extends('layouts.admin')

@section('title', 'Gestión de Productos - Cebar Club')

@section('content')
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Catálogo de Productos</h1>
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
                    <td>
                        @if($producto->trashed())
                            <span class="badge bg-danger">Dado de Baja</span>
                        @else
                            <span class="badge bg-success">Activo</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($producto->trashed())
                            <form action="{{ route('productos.restore', $producto->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-info text-white fw-bold">🔄 Restaurar</button>
                            </form>
                        @else
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
@endsection