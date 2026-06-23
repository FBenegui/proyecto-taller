@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="my-4">Historial de compras - {{ $usuario->nombre }} {{ $usuario->apellido }}</h2>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mb-3">Volver a usuarios</a>

    @if($ventas->isEmpty())
        <p>No hay compras para este usuario.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>${{ number_format($venta->total, 0, ',', '.') }}</td>
                    <td>{{ optional($venta->fecha_venta)->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-sm btn-primary">Ver detalle</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
