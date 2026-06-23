<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-4">
			<div class="card shadow-sm">
				<div class="card-body">
					<h5 class="card-title text-center mb-4">Iniciar sesión</h5>

					<?php if($errors->any()): ?>
						<div class="alert alert-danger py-2">
							<ul class="mb-0">
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					<?php endif; ?>

					<form method="POST" action="/login">
						<?php echo csrf_field(); ?>

						<div class="mb-3">
							<label for="email" class="form-label">Correo electrónico</label>
							<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label">Contraseña</label>
							<input id="password" type="password" class="form-control" name="password" required>
						</div>

						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
							<label class="form-check-label" for="remember">Recuérdame</label>
						</div>

						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Entrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\almua\Herd\proyecto-taller\resources\views/backend/usuarios/login.blade.php ENDPATH**/ ?>