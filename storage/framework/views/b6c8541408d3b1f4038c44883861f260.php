

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1>Bienvenido, <?php echo e(auth()->user()->name); ?></h1>
    <p>Este es tu panel de cliente.</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Ver productos</h5>
                <a href="/productos" class="btn btn-primary">Ir al catálogo</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Mi carrito</h5>
                <a href="/carrito" class="btn btn-secondary">Ver carrito</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\almua\Herd\proyecto-taller\resources\views/cliente/inicio.blade.php ENDPATH**/ ?>