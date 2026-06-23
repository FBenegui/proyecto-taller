@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="my-4">Detalle de Venta #{{ $compra->id }}</h2>
    <p><strong>Cliente:</strong> {{ $compra->usuario->nombre ?? $compra->usuario->email ?? '—' }}</p>
    <p><strong>Fecha:</strong> {{ $compra->fecha_venta->format('d/m/Y H:i') }}</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th class="text-end">Cantidad</th>
                <th class="text-end">Precio unit.</th>
                <th class="text-end">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compra->detalles as $det)
            <tr>
                <td>{{ $det->producto->nombre ?? 'Producto eliminado' }}</td>
                <td class="text-end">{{ $det->cantidad }}</td>
                <td class="text-end">${{ number_format($det->precio_unitario, 0, ',', '.') }}</td>
                <td class="text-end">${{ number_format($det->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end"><strong>Total</strong></td>
                <td class="text-end"><strong>${{ number_format($compra->total, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
