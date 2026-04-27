@extends('layouts.app')

@section('title', 'Informacion de Contactos')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Contactanos</h1>
    <div class="tarjeta">
            <h1 class="tarjeta-title">FABRIZZIO BENEGUI</h1>
            <h2 class="tarjeta-subtitle">CEO & Co-Fundador</h2>
            <p class="tarjeta-text"><strong>Teléfono:</strong> +54 9 3794 05-7316</p>
            <p class="tarjeta-text"><strong>Email:</strong> fabrizziobenegui28@gmail.com</p>
    </div>
    <div class="tarjeta">
            <h1 class="tarjeta-title">VALENTIN ALMUA</h1>
            <h2 class="tarjeta-subtitle">CEO & Co-Fundador</h2>
            <p class="tarjeta-text"><strong>Teléfono:</strong> +54 9 3794 97-6333</p>
            <p class="tarjeta-text"><strong>Email:</strong> almuavalentin@gmail.com</p>
    </div>
    <div class="tarjeta">
        <div class="tarjeta-title">
            <h1 class="tarjeta-title">Encontranos en:</h1>
            <p class="tarjeta-text"><strong>Direccion:</strong> junin 1533, Corrientes, Argentina</p>
            <p class="tarjeta-text"><strong>Horario de atención:</strong> Lunes a Viernes de 9:00 a 13:00 - 17:00 a 21:00</p>
        </div>
    </div>
    <form action="{{ url('/contactanos') }}" method="POST">
        @csrf
        <h2> Formulario de contacto</h2>
    <div class="form-imput">
        <label for="nombre">Nombre Completo</label>
        <input type="text" id="nombre" placeholder="Tito Calderon" required name="nombre">
    </div>
    <div class="form-imput">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="tu.email@ejemplo.com" required name="email">
    </div>
    <div class="form-imput">
        <label for="consulta">Consulta</label>
        <textarea id="consulta" placeholder="Dejanos tu consulta" required name="consulta"></textarea>
    </div>
    <div class="form-imput">
        <button type="submit">Enviar Mensaje</button>
    </div>

    </form>
</div>

@endsection