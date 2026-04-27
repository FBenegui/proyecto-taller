<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cebar Club | @yield('title', 'Inicio')</title>
    
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-mate shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">Cebar Club</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == '/' ? 'active' : '' }}" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'sobre-nosotros' ? 'active' : '' }}" href="/sobre-nosotros">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'productos' ? 'active' : '' }}" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'comercializacion' ? 'active' : '' }}" href="/comercializacion">Comercialización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'terminos-y-usos' ? 'active' : '' }}" href="/terminos-y-usos">Términos y Usos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->path() == 'contactanos' ? 'active' : '' }}" href="/contactanos">Contáctanos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1 py-4">
        @yield('content')
    </main>

    <footer class="bg-mate text-light py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="fw-bold">Cebar Club</h5>
                    <p>Tu sitio web confiable para todas tus necesidades.</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5 class="fw-bold">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-light text-decoration-none">Inicio</a></li>
                        <li><a href="/sobre-nosotros" class="text-light text-decoration-none">Sobre Nosotros</a></li>
                        <li><a href="/productos" class="text-light text-decoration-none">Productos</a></li>
                        <li><a href="/contactanos" class="text-light text-decoration-none">Contáctanos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">Contacto</h5>
                    <p class="mb-1">Email: almuavalentin@gmail.com</p>
                    <p class="mb-3">Teléfono: +54 3794 976 333</p>
                    <div>
                        <a href="#" class="text-light me-3 text-decoration-none">Facebook</a>
                        <a href="#" class="text-light me-3 text-decoration-none">Twitter</a>
                        <a href="#" class="text-light text-decoration-none">Instagram</a>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-light opacity-50">
            <div class="text-center">
                <p class="mb-0">&copy; 2026 Mi Sitio Web. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>