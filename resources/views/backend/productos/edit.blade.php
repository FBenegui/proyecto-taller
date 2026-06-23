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
                    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" required value="{{ old('nombre', $producto->nombre) }}" placeholder="Mate Imperial Premium">
                            @error('nombre') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Descripción</label>
                            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required value="{{ old('descripcion', $producto->descripcion) }}" placeholder="Calabaza forrada en cuero vaqueta de exportación...">
                            @error('descripcion') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Precio ($)</label>
                                <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror" required min="0.01" step="0.01" value="{{ old('precio', $producto->precio) }}">
                                @error('precio') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stock (Unidades)</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" required min="0" value="{{ old('stock', $producto->stock) }}">                                @error('stock') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto del producto (opcional)</label>
                            @if(!empty($producto->url_imagen))
                                <div class="mb-2">
                                    <img src="/{{ $producto->url_imagen }}" alt="imagen" class="img-fluid" style="max-height:150px;">
                                </div>
                            @endif
                            <input type="file" name="imagen" accept="image/*" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Categoría</label>
                            <select name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categorias as $cat)
                                    <option value="{{ $cat->id }}" {{ old('categoria_id', $producto->categoria_id) == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                                @endforeach
                            </select>
                            @error('categoria_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
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