@extends('layouts.app')

@section('title', 'Consultas')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Formulario de contacto</h2>
            <form action="{{ url('/consultas') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea class="form-control" name="mensaje" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Enviar mensaje</button>
            </form>
        </div>
    </div>
</div>
@endsection