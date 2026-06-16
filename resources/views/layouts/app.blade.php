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
                        {{-- Auth links: login/register and user menu --}}
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
                                @php
                                    $cartCount = 0;
                                    if (auth()->check()) {
                                        $carrito = \App\Models\VentaCabecera::where('user_id', auth()->id())
                                            ->where('estado', 'carrito')
                                            ->first();
                                        $cartCount = $carrito ? $carrito->detalles()->count() : 0;
                                    }
                                @endphp
                                <li class="nav-item ms-2">
                                    <a class="nav-link position-relative" href="{{ auth()->check() ? route('cliente.carrito') : route('login') }}" title="Carrito">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM3.14 6l1.25 6h8.22l1.2-6H3.14z"/>
                                            <path d="M6 12a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm6 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                        @if($cartCount > 0)
                                            <span class="badge bg-danger rounded-pill position-absolute" style="top:0;right:0;transform:translate(30%,-30%);">{{ $cartCount }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item dropdown ms-3">
                                <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hola, {{ auth()->user()->nombre }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                    @if($isAdmin)
                                        <li><a class="dropdown-item" href="/admin">Panel Admin</a></li>
                                        <li><a class="dropdown-item" href="/usuarios">Usuarios</a></li>
                                        <li><a class="dropdown-item" href="/admin/ventas">Ventas</a></li>
                                        <li><a class="dropdown-item" href="/mensajes">Consultas</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="/carrito">Mi carrito</a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item ms-3">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            <li class="nav-item ms-2">
                                <a class="nav-link" href="/registrar">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-mate text-light py-5 mt-auto">
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
                    <div class="mb-3">
                        <a href="#" class="text-light me-3 text-decoration-none">Facebook</a>
                        <a href="#" class="text-light me-3 text-decoration-none">Twitter</a>
                        <a href="#" class="text-light text-decoration-none">Instagram</a>
                    </div>
                    <p class="mb-0"><strong>Ubicación:</strong><br>
                        <a href="https://maps.google.com/maps?q=Junín+1533,+Corrientes,+Argentina" target="_blank" class="text-light text-decoration-none d-inline-flex align-items-center">
                            <svg width="16" height="16" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                            </svg>
                            Junín 1533, Corrientes, Argentina
                        </a>
                    </p>
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