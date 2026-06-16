@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="my-4">Historial de Ventas (Administrador)</h2>
        <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID Venta</th>
                <th>Cliente</th>
                <th>Email</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ data_get($venta, 'id') }}</td>
                <td>{{ data_get($venta, 'usuario.nombre', data_get($venta, 'usuario.name', 'Cliente') ) }}</td>
                <td>{{ data_get($venta, 'usuario.email', '-') }}</td>
                <td>${{ number_format(data_get($venta, 'total', 0), 2, ',', '.') }}</td>
                <td>{{ optional(data_get($venta, 'fecha_venta') ?? data_get($venta, 'created_at'))->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection