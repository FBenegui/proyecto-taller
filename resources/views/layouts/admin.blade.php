<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | @yield('title', 'Panel')</title>
    <link rel="icon" href="{{ asset('imagenes/icono.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-mate shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="/">Cebar Club</a>
                <div class="d-flex align-items-center ms-auto">
                    <span class="me-3 text-light">Administrador</span>
                    <a class="btn btn-sm btn-outline-light" href="/">Ver sitio</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        <div class="container-fluid mt-4">
            <div class="row">
                <aside class="col-md-3 col-lg-2 bg-white border-end vh-100 p-3 position-sticky" style="top:0">
                    <h5 class="text-mate">Panel Admin</h5>
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="/admin">Dashboard General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('productos*') ? 'active' : '' }}" href="{{ route('productos.index') }}">
                                <span>Productos</span>
                                <span class="badge bg-secondary ms-2">{{ $totalProductos ?? '—' }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('usuarios*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                                <span>Usuarios</span>
                                <span class="badge bg-secondary ms-2">{{ \App\Models\Usuario::count() ?? '—' }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('mensajes*') ? 'active' : '' }}" href="{{ route('mensajes.index') }}">
                                <span>Consultas</span>
                                <span class="badge bg-secondary ms-2">{{ $totalConsultas ?? '—' }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('admin/ventas*') ? 'active' : '' }}" href="{{ route('ventas.index') }}">
                                <span>Ventas</span>
                                <span class="badge bg-secondary ms-2">{{ $ventasMes ?? '—' }}</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger w-100">Cerrar sesión</button>
                    </form>
                </aside>

                <section class="col-md-9 col-lg-10 p-4">
                    @yield('content')
                </section>
            </div>
        </div>
    </main>

    <footer class="bg-mate text-light py-3 mt-auto">
        <div class="container text-center">
            <small>&copy; 2026 Cebar Club</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
