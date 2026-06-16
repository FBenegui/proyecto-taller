@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="my-4">Historial de Ventas (Administrador)</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID Venta</th>
                <th>Usuario</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->user->name ?? 'Usuario' }}</td>
                <td>${{ number_format($venta->total, 2) }}</td>
                <td>{{ $venta->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection