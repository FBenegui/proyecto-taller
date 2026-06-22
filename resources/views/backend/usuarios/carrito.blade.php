@extends('layouts.app')

@section('title', 'Mi Carrito')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Mi Carrito</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($items->isEmpty())
        <p>Tu carrito está vacío. <a href="/productos">Ir al catálogo</a></p>
    @else
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td style="width:80px;">
                        @if(isset($item->producto) && !empty($item->producto->url_imagen))
                            <img src="{{ asset($item->producto->url_imagen) }}" alt="{{ $item->producto->nombre }}" class="img-fluid" style="max-height:60px;">
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    <td>{{ $item->producto->nombre }}</td>
                    <td>$ {{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('carrito.decrementar', $item->id) }}" method="POST" class="me-1 d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary">-</button>
                            </form>
                            <form action="{{ route('carrito.actualizar', $item->id) }}" method="POST" class="me-2 d-inline">
                                @csrf
                                <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="form-control form-control-sm" style="width:80px; display:inline-block;">
                                <button class="btn btn-sm btn-primary ms-1">OK</button>
                            </form>
                            <form action="{{ route('carrito.incrementar', $item->id) }}" method="POST" class="me-2 d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary">+</button>
                            </form>
                        </div>
                    </td>
                    <td>$ {{ number_format($item->subtotal, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar este ítem?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3 align-items-center">
        <h4 class="me-3">Total: $ {{ number_format($carrito->total, 2, ',', '.') }}</h4>
        <form action="{{ route('carrito.vaciar') }}" method="POST" class="me-2">
            @csrf
            <button class="btn btn-outline-danger">Vaciar Carrito</button>
        </form>
        <form action="{{ route('carrito.confirmar') }}" method="POST">
            @csrf
            <button class="btn btn-success">Confirmar Compra</button>
        </form>
    </div>
    @endif
</div>
@endsection
