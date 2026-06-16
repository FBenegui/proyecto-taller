@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark text-center">
                    <h4>✏️ Editar Producto</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control" required value="{{ $producto->nombre }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <input type="text" name="descripcion" class="form-control" required value="{{ $producto->descripcion }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Precio ($)</label>
                                <input type="number" name="precio" class="form-control" required value="{{ $producto->precio }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stock (Unidades)</label>
                                <input type="number" name="stock" class="form-control" required value="{{ $producto->stock }}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="/productos" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning fw-bold">Actualizar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection