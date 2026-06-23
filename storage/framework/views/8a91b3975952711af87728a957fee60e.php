<?php $__env->startSection('title', 'Inicio'); ?>

<?php $__env->startSection('content'); ?>
<div id="carouselInicio" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselInicio" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carouselInicio" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselInicio" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active hero-slide" data-bs-interval="5000">
            <img src="<?php echo e(asset('imagenes/carrousel1.png')); ?>" class="d-block w-100 hero-img" alt="Mate principal">
        </div>
        <div class="carousel-item hero-slide" data-bs-interval="5000">
            <img src="<?php echo e(asset('imagenes/carrousel2.png')); ?>" class="d-block w-100 hero-img" alt="Accesorios">
        </div>
        <div class="carousel-item hero-slide" data-bs-interval="5000">
            <img src="<?php echo e(asset('imagenes/carrousel3.png')); ?>" class="d-block w-100 hero-img" alt="Yerba">
        </div>
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselInicio" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselInicio" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<div class="container mt-5 pt-4 text-center">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <span class="text-uppercase fw-bold" style="color: var(--verde-mate); letter-spacing: 2px; font-size: 0.9rem;">Tu punto de encuentro</span>
            <h1 class="display-5 fw-bold text-dark mt-2">Bienvenidos a Cebar <span class="text-mate">Club</span></h1>
            <p class="lead text-muted mt-3">
                Más que una tienda, somos el espacio para quienes entienden que un buen mate es indispensable. Ya sea para arrancar la mañana con fuerza o para recuperar energías después de un día intenso, acá vas a encontrar la calidad que buscás.
            </p>
            <hr class="w-25 mx-auto border-mate opacity-75 mt-4 mb-5" style="border-width: 3px;">
        </div>
    </div>
</div>

<div class="container mb-5 pb-4">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="fw-bold m-0">Productos <span class="text-mate">Destacados</span></h3>
        <a href="/productos" class="text-decoration-none fw-bold" style="color: var(--verde-mate);">Ver todos &rarr;</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__empty_1 = true; $__currentLoopData = $productosDestacados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm producto-card">
                    <img src="<?php echo e(asset($producto->url_imagen)); ?>" class="card-img-top p-3 rounded-4" alt="<?php echo e($producto->nombre); ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold"><?php echo e($producto->nombre); ?></h5>
                        <p class="card-text text-muted"><?php echo e(Str::limit($producto->descripcion, 80)); ?></p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="fs-5 fw-bold text-mate">$<?php echo e(number_format($producto->precio, 0, ',', '.')); ?></span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="<?php echo e(route('producto.show', $producto->id)); ?>" class="btn btn-outline-mate w-100 fw-bold">Ver producto</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-info mb-0">No hay productos destacados disponibles en este momento.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Sección de ubicación -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h3 class="fw-bold mb-4">Visítanos en nuestro local</h3>
                <p class="mb-4 fs-5">Estamos ubicados en el corazón de Corrientes, listos para atenderte personalmente</p>

                <!-- Mapa embebido -->
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-8">
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://maps.google.com/maps?q=Junín+1533,+Corrientes,+Argentina&output=embed"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <strong class="fs-5">Dirección: Junín 1533, Corrientes, Argentina</strong>
                </div>
    
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\almua\Herd\proyecto-taller\resources\views/inicio.blade.php ENDPATH**/ ?>