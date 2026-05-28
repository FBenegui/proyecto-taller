@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-4">
			<div class="card shadow-sm">
				<div class="card-body">
					<h5 class="card-title text-center mb-4">Iniciar sesión</h5>

					@if ($errors->any())
						<div class="alert alert-danger py-2">
							<ul class="mb-0">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form method="POST" action="/login">
						@csrf

						<div class="mb-3">
							<label for="email" class="form-label">Correo electrónico</label>
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label">Contraseña</label>
							<input id="password" type="password" class="form-control" name="password" required>
						</div>

						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
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
@endsection

