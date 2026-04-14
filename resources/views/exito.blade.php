<!DOCTYPE html>
<html>
<head>
    <title>Exito</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <div class="navbar-nav">
        <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Inicio</a>
        <a class="nav-link {{ request()->path() == 'sobre-mi' ? 'active' : '' }}" href="/sobre-mi">Sobre Mi</a>
        <a class="nav-link {{ request()->path() == 'contactos' ? 'active' : '' }}" href="/contacto">Contacto</a>
         </div>
        </div>
        </nav>
    </header>

    <p class="lead">
        Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje. Un miembro
        del equipo de ventas se pondrá en contacto con vos al correo: <strong>{{ $email
        }}</strong> ¡Muchas gracias!
    </p>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
