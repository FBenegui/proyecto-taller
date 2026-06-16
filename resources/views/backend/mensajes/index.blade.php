@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>Consultas recibidas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mensajes as $m)
            <tr>
                <td>{{ $m->nombre }}</td>
                <td>{{ $m->email }}</td>
                <td>{{ $m->mensaje }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection