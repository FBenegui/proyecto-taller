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

            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
            <tr>
                <td>{{ $u->nombre }}</td>
                <td>{{ $u->apellido }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->rol->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection