@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-mate text-white">
                    <h3 class="mb-0">Crear Cuenta</h3>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡Error en el registro!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('registrar') }}">
                        @csrf

                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                            <input type="text" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                id="nombre" 
                                name="nombre" 
                                value="{{ old('nombre') }}"
                                placeholder="Ingrese su nombre completo"
                                required>
                            @error('nombre')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-semibold">Apellido <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('apellido') is-invalid @enderror"
                                id="apellido"
                                name="apellido"
                                value="{{ old('apellido') }}"
                                placeholder="Ingrese su apellido"
                                required>
                            @error('apellido')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Correo Electrónico <span class="text-danger">*</span></label>
                            <input type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="ejemplo@correo.com"
                                required>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Teléfono -->
                        <div class="mb-3">
                            <label for="telefono" class="form-label fw-semibold">Teléfono <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                id="telefono"
                                name="telefono"
                                value="{{ old('telefono') }}"
                                placeholder="Ingrese su teléfono"
                                required>
                            @error('telefono')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Dirección -->
                        <div class="mb-3">
                            <label for="direccion" class="form-label fw-semibold">Dirección <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('direccion') is-invalid @enderror"
                                id="direccion"
                                name="direccion"
                                value="{{ old('direccion') }}"
                                placeholder="Calle, número, piso o referencia"
                                required>
                            @error('direccion')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Código Postal -->
                        <div class="mb-3">
                            <label for="codigo_postal" class="form-label fw-semibold">Código Postal <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('codigo_postal') is-invalid @enderror"
                                id="codigo_postal"
                                name="codigo_postal"
                                value="{{ old('codigo_postal') }}"
                                placeholder="Ingrese su código postal"
                                required>
                            @error('codigo_postal')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Ciudad / Provincia -->
                        <div class="mb-3">
                            <label for="ciudad" class="form-label fw-semibold">Ciudad o Provincia <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('ciudad') is-invalid @enderror"
                                id="ciudad"
                                name="ciudad"
                                value="{{ old('ciudad') }}"
                                placeholder="Ingrese su ciudad o provincia"
                                required>
                            @error('ciudad')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Mínimo 8 caracteres"
                                required>
                            <small class="form-text text-muted d-block mt-1">Debe contener al menos 8 caracteres</small>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo Confirmar Contraseña -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contraseña <span class="text-danger">*</span></label>
                            <input type="password" 
                                class="form-control @error('password_confirmation') is-invalid @enderror" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Repita su contraseña"
                                required>
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-mate fw-semibold">Registrarse</button>
                        </div>

                        <div class="text-center mt-3">
                            <p class="text-muted">¿Ya tienes cuenta? 
                                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">Inicia sesión aquí</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
