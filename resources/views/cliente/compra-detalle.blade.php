@extends('layouts.app')

@section('title', 'Detalle de Compra')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="h5">Detalle de compra #{{ $compra->id }}</h2>
            <p class="text-muted">Fecha: {{ $compra->fecha_venta->format('d/m/Y H:i') }}</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th class="text-end">Cantidad</th>
                        <th class="text-end">Precio unit.</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compra->detalles as $det)
                        <tr>
                            <td style="width:80px;">
                                @if(isset($det->producto) && !empty($det->producto->url_imagen))
                                    <img src="{{ asset($det->producto->url_imagen) }}" alt="{{ $det->producto->nombre }}" class="img-fluid" style="max-height:60px;">
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>{{ $det->producto->nombre ?? 'Producto eliminado' }}</td>
                            <td class="text-end">{{ $det->cantidad }}</td>
                            <td class="text-end">${{ number_format($det->precio_unitario, 0, ',', '.') }}</td>
                            <td class="text-end">${{ number_format($det->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                        <td class="text-end"><strong>${{ number_format($compra->total, 0, ',', '.') }}</strong></td>
                    </tr>
                </tfoot>
            </table>
            <a href="{{ route('cliente.compras') }}" class="btn btn-secondary">Volver al historial</a>
        </div>
    </div>
</div>
@endsection
