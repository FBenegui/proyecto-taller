@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Rol </th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
            <tr>
                <td>{{ $u->nombre }}</td>
                <td>{{ $u->apellido }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ optional($u->rol)->nombre ?? 'Sin rol' }}</td>
                <td>
                    <a href="{{ route('usuarios.ventas', $u->id) }}" class="btn btn-sm btn-primary">Ver historial</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection