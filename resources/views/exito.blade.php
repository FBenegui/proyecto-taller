@extends('layouts.app')

@section('title', 'Mensaje Enviado')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success">
        <p class="lead">
            Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje. Un miembro
            del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email }}</strong> ¡Muchas gracias!
        </p>
    </div>
</div>
@endsection
