@extends('layouts.app')

@section('title', 'Compra Confirmada')

@section('content')
<div class="container mt-4">
    <div class="alert alert-success">
        <h4 class="mb-1">¡Compra confirmada!</h4>
        <p>Gracias por tu compra. A continuación los detalles:</p>
    </div>

    @if(session('items'))
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('items') as $item)
                <tr>
                    <td>{{ data_get($item, 'producto.nombre', 'Producto') }}</td>
                    <td>{{ data_get($item, 'cantidad') }}</td>
                    <td>$ {{ number_format(data_get($item, 'precio_unitario', 0), 2, ',', '.') }}</td>
                    <td>$ {{ number_format(data_get($item, 'subtotal', 0), 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="mt-3">
        <h5>Total pagado: $ {{ number_format(session('total', 0), 2, ',', '.') }}</h5>
        <a href="/productos" class="btn btn-primary mt-3">Seguir comprando</a>
    </div>
</div>
@endsection
