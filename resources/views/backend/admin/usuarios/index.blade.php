@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Lista de Usuarios</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection