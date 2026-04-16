<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mi Paginas')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #4d8a34;">
            <div class="container">
                <a class="navbar-brand" href="/">Mi Sitio Web</a>
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
                            <a class="nav-link {{ request()->path() == 'consultas' ? 'active' : '' }}" href="/consultas">Consultas</a>
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

    <main>
        @yield('content')
    </main>

    <footer style="background-color: #4d8a34; color: white;" class="text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Mi Sitio Web</h5>
                    <p>Tu sitio web confiable para todas tus necesidades.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-light">Inicio</a></li>
                        <li><a href="/sobre-mi" class="text-light">Sobre Nosotros</a></li>
                        <li><a href="/productos" class="text-light">Productos</a></li>
                        <li><a href="/contactanos" class="text-light">Contáctanos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Email: info@misitioweb.com</p>
                    <p>Teléfono: +54 3794 976 333</p>
                    <div>
                        <a href="#" class="text-light me-2">Facebook</a>
                        <a href="#" class="text-light me-2">Twitter</a>
                        <a href="#" class="text-light">Instagram</a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; 2023 Mi Sitio Web. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
