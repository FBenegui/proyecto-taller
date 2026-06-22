<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            @if(!empty($producto->url_imagen))
                <img src="{{ asset($producto->url_imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded-4">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height:300px;">Sin imagen</div>
            @endif
        </div>
        <div class="col-md-6">
            <h3 class="fw-bold">{{ $producto->nombre }}</h3>
            @if(isset($producto->categoria) && $producto->categoria)
                <p class="text-muted">Categoría: {{ $producto->categoria->nombre }}</p>
            @endif
            <p class="lead text-mate fs-4">${{ number_format($producto->precio, 0, ',', '.') }}</p>
            <p class="small text-muted">{{ $producto->descripcion }}</p>
            <p class="mt-3"><strong>Stock:</strong> {{ $producto->stock ?? '—' }} unidades</p>

            <div class="mt-3">
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
                        <form method="POST" action="{{ route('carrito.agregar') }}" class="d-inline" data-ajax="carrito">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <input type="number" name="cantidad" value="1" min="1" max="{{ $producto->stock }}" class="form-control d-inline-block me-2" style="width:100px;">
                            <button type="submit" class="btn btn-mate fw-bold">Agregar al carrito</button>
                        </form>
                    @else
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Gestionar producto</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-mate fw-bold">Iniciar sesión para comprar</a>
                @endauth
            </div>
        </div>
    </div>
</div>
