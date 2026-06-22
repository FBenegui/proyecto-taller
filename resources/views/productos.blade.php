@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold">Nuestros <span class="text-mate">Productos</span></h1>
            <p class="lead text-muted">Selección premium de mates, yerbas y accesorios para el cebador exigente.</p>
            <hr class="w-25 mx-auto border-mate opacity-75" style="border-width: 3px;">
        </div>
    </div>

    @php
        $defaultItems = collect([
            (object)[ 'id' => 0, 'nombre' => 'Mate Imperial Premium', 'descripcion' => 'Calabaza seleccionada forrada en cuero vaqueta con virola de alpaca cincelada.', 'precio' => 25900, 'stock' => 10, 'url_imagen' => 'imagenes/mate-imperial.jpg', 'categoria' => 'mates' ],
            (object)[ 'id' => 0, 'nombre' => 'Mate Algarrobo', 'descripcion' => 'Fabricado en madera de algarrobo seleccionada, este mate destaca por su durabilidad y el aroma único que le aporta a cada cebada.', 'precio' => 22500, 'stock' => 5, 'url_imagen' => 'imagenes/mate-algarrobo.jpg', 'categoria' => 'mates' ],
            (object)[ 'id' => 0, 'nombre' => 'Mate Camionero', 'descripcion' => 'Un mate de gran tamaño, forrado en cuero legítimo de alta calidad con costuras reforzadas.', 'precio' => 20500, 'stock' => 3, 'url_imagen' => 'imagenes/mate-camionero.jpeg', 'categoria' => 'mates' ],
            (object)[ 'id' => 0, 'nombre' => 'Yerba Mate Cosmico 1kg', 'descripcion' => 'Yerba mate de molienda equilibrada y estacionamiento natural.', 'precio' => 4500, 'stock' => 20, 'url_imagen' => 'imagenes/cosmico-yerba.jpg', 'categoria' => 'yerba' ],
            (object)[ 'id' => 0, 'nombre' => 'Canasta Matera', 'descripcion' => 'Confeccionada artesanalmente en cuero vacuno de exportación.', 'precio' => 40299, 'stock' => 2, 'url_imagen' => 'imagenes/canasta-matera.jpg', 'categoria' => 'materas' ],
            (object)[ 'id' => 0, 'nombre' => 'Bombilla de Alpaca', 'descripcion' => 'Modelo pico de loro con filtro desarmable para fácil limpieza.', 'precio' => 30200, 'stock' => 8, 'url_imagen' => 'imagenes/bombilla-alpaca.jpg', 'categoria' => 'bombillas' ],
        ]);

        $categories = [
            'yerba' => 'Yerbas',
            'mates' => 'Mates',
            'bombillas' => 'Bombillas',
            'materas' => 'Materas',
        ];

        if (isset($productos) && $productos instanceof \Illuminate\Support\Collection) {
            $items = $productos->map(function($p) {
                $categoriaSlug = null;
                $categoriaNombre = null;
                if (isset($p->categoria) && is_object($p->categoria)) {
                    $categoriaSlug = $p->categoria->slug ?? $p->categoria->nombre ?? null;
                    $categoriaNombre = $p->categoria->nombre ?? null;
                }
                if (!$categoriaSlug && isset($p->categoria_id)) {
                    $categoriaSlug = 'c' . $p->categoria_id;
                }

                return (object)[
                    'id' => $p->id,
                    'nombre' => $p->nombre,
                    'descripcion' => $p->descripcion,
                    'precio' => $p->precio,
                    'stock' => $p->stock,
                    'url_imagen' => $p->url_imagen,
                    'categoria' => $categoriaSlug,
                    'categoria_label' => $categoriaNombre,
                ];
            });
        } else {
            $items = $defaultItems;
        }

        $grouped = collect($items)->groupBy('categoria');
    @endphp

    @foreach($categories as $catKey => $catLabel)
        @php $catItems = $grouped->get($catKey, collect()); @endphp
        @if($catItems->isNotEmpty())
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="h4 fw-bold">{{ $catLabel }}</h2>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                @foreach($catItems as $producto)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm producto-card">
                            <img src="{{ asset($producto->url_imagen) }}" class="card-img-top p-3 rounded-4" alt="{{ $producto->nombre }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                                <p class="card-text text-muted small flex-grow-1">{{ $producto->descripcion }}</p>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fs-4 fw-bold text-mate">${{ number_format($producto->precio, 0, ',', '.') }}</span>

                                    <form class="ms-3" action="/carrito/agregar" method="POST" data-ajax="carrito" style="display:inline-block">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                        <input type="hidden" name="cantidad" value="1">
                                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                                    </form>
                                </div>

                                <div class="d-flex align-items-center mt-3">
                                    <small class="text-muted">Stock: {{ $producto->stock }}</small>
                                    <div class="ms-auto">
                                        <button class="btn btn-outline-primary btn-sm btn-producto-detalle" data-id="{{ $producto->id }}">Ver detalles</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach

</div>

<!-- Modal placeholder -->
<div class="modal fade" id="productoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle del producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Cargando...</div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const modalEl = document.getElementById('productoModal');
    const bsModal = modalEl ? new bootstrap.Modal(modalEl) : null;

    function showGlobalToast(text, type = 'success'){
        try {
            const existing = document.querySelector('.global-ajax-toast');
            if (existing) existing.remove();
            const div = document.createElement('div');
            div.className = 'global-ajax-toast alert ' + (type === 'success' ? 'alert-success' : 'alert-danger');
            div.style.position = 'fixed';
            div.style.top = '20px';
            div.style.right = '20px';
            div.style.zIndex = 1055;
            div.textContent = text;
            document.body.appendChild(div);
            setTimeout(()=> div.remove(), 2200);
        } catch(e){}
    }

    function updateCartBadge(delta) {
        try {
            const cartLink = document.querySelector('a[title="Carrito"]');
            if (!cartLink) return;
            let badge = cartLink.querySelector('.badge');
            if (badge) {
                const current = parseInt(badge.textContent.replace(/\D/g, '')) || 0;
                const next = current + delta;
                if (next > 0) badge.textContent = next;
                else badge.remove();
            } else if (delta > 0) {
                badge = document.createElement('span');
                badge.className = 'badge bg-danger rounded-pill position-absolute';
                badge.style.top = '0';
                badge.style.right = '0';
                badge.style.transform = 'translate(30%,-30%)';
                badge.textContent = delta;
                cartLink.appendChild(badge);
            }
        } catch (e) {
            // ignore
        }
    }

    document.addEventListener('submit', async function(e){
        const form = e.target;
        if (!form || !form.matches('form[data-ajax="carrito"]')) return;
        e.preventDefault();

        const url = form.getAttribute('action');
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        const token = tokenMeta ? tokenMeta.getAttribute('content') : '';
        const formData = new FormData(form);

        try {
            const resp = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': token
                },
                body: formData,
                credentials: 'same-origin'
            });

            if (!resp.ok) {
                if (form.closest('#productoModal') && bsModal) {
                    const body = modalEl.querySelector('.modal-body');
                    const existing = body.querySelector('.ajax-message'); if (existing) existing.remove();
                    const div = document.createElement('div');
                    div.className = 'ajax-message alert alert-danger';
                    div.textContent = 'No se pudo agregar al carrito.';
                    body.prepend(div);
                } else {
                    showGlobalToast('No se pudo agregar al carrito.', 'error');
                }
                return;
            }

            const added = parseInt(formData.get('cantidad')) || 1;
            updateCartBadge(added);

            if (form.closest('#productoModal') && bsModal) {
                const body = modalEl.querySelector('.modal-body');
                const existing = body.querySelector('.ajax-message'); if (existing) existing.remove();
                const div = document.createElement('div');
                div.className = 'ajax-message alert alert-success';
                div.textContent = 'Producto agregado al carrito';
                body.prepend(div);
                setTimeout(()=> bsModal.hide(), 900);
            } else {
                showGlobalToast('Producto agregado al carrito', 'success');
            }

        } catch(err) {
            if (form.closest('#productoModal') && bsModal) {
                const body = modalEl.querySelector('.modal-body');
                const existing = body.querySelector('.ajax-message'); if (existing) existing.remove();
                const div = document.createElement('div');
                div.className = 'ajax-message alert alert-danger';
                div.textContent = 'Error de red al añadir al carrito.';
                body.prepend(div);
            } else {
                showGlobalToast('Error de red al añadir al carrito.', 'error');
            }
        }
    });

    // Bind modal open buttons
    document.querySelectorAll('.btn-producto-detalle').forEach(btn => {
        btn.addEventListener('click', async function(e){
            const id = this.dataset.id;
            if (!bsModal) return;
            const body = modalEl.querySelector('.modal-body');
            body.innerHTML = '<div class="text-center py-4">Cargando...</div>';
            bsModal.show();
            try {
                const res = await fetch(`/producto/modal/${id}`);
                if (!res.ok) throw new Error('Error al cargar');
                const html = await res.text();
                body.innerHTML = html;
            } catch (err) {
                body.innerHTML = '<div class="alert alert-danger">No se pudo cargar el detalle.</div>';
            }
        });
    });
});
</script>

@endsection
