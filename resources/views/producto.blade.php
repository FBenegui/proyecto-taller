@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if(!empty($producto->url_imagen))
                <img src="{{ asset($producto->url_imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded-4">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height:300px;">Sin imagen</div>
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold">{{ $producto->nombre }}</h1>
            @if(isset($producto->categoria) && $producto->categoria)
                <p class="text-muted">Categoría: {{ $producto->categoria->nombre }}</p>
            @endif
            <p class="lead text-mate fs-4">${{ number_format($producto->precio, 0, ',', '.') }}</p>
            <p class="small text-muted">{{ $producto->descripcion }}</p>
            <p class="mt-3"><strong>Stock:</strong> {{ $producto->stock ?? '—' }} unidades</p>

            <div class="mt-4">
                @auth
                    @php
                        $userRole = auth()->user()->rol ?? null;
                        $isAdmin = false;
                        if ($userRole) {
                            if (is_string($userRole)) {
                                $isAdmin = $userRole === 'admin';
                            } elseif (is_object($userRole) && property_exists($userRole, 'nombre')) {
                                $isAdmin = $userRole->nombre === 'admin';
                            }
                        }
                    @endphp

                    @if(!$isAdmin)
                        <form method="POST" action="{{ route('carrito.agregar') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                            <div class="d-flex align-items-center">
                                <div class="input-group me-2" style="width:140px;">
                                    <button type="button" class="btn btn-outline-secondary btn-decrease" aria-label="Disminuir">-</button>
                                    <input id="cantidadInput" type="number" name="cantidad" value="1" min="1" max="{{ $producto->stock }}" class="form-control text-center" style="width:60px;">
                                    <button type="button" class="btn btn-outline-secondary btn-increase" aria-label="Aumentar">+</button>
                                </div>

                                <button type="submit" class="btn btn-mate fw-bold">Agregar al carrito</button>
                            </div>
                        </form>
                    @else
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Gestionar producto</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-mate fw-bold">Iniciar sesión para comprar</a>
                @endauth
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var stock = {{ $producto->stock ?? 0 }};
                    var input = document.getElementById('cantidadInput');
                    if (!input) return;
                    var btnInc = document.querySelector('.btn-increase');
                    var btnDec = document.querySelector('.btn-decrease');

                    function updateButtons() {
                        var val = parseInt(input.value) || 1;
                        if (val <= 1) {
                            btnDec.disabled = true;
                        } else {
                            btnDec.disabled = false;
                        }
                        if (val >= stock) {
                            btnInc.disabled = true;
                            input.value = stock;
                        } else {
                            btnInc.disabled = false;
                        }
                    }

                    btnInc.addEventListener('click', function () {
                        var val = (parseInt(input.value) || 0) + 1;
                        if (val > stock) val = stock;
                        input.value = val;
                        updateButtons();
                    });

                    btnDec.addEventListener('click', function () {
                        var val = (parseInt(input.value) || 0) - 1;
                        if (val < 1) val = 1;
                        input.value = val;
                        updateButtons();
                    });

                    input.addEventListener('input', function () {
                        var val = parseInt(input.value) || 1;
                        if (val < 1) val = 1;
                        if (val > stock) val = stock;
                        input.value = val;
                        updateButtons();
                    });

                    updateButtons();
                });
            </script>
        </div>
    </div>
</div>
@endsection
