<!DOCTYPE html> 
<html> 
    <head>
        <title>Contacto</title>
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
                <div class="card mt-4">
                    <div class="card-body">
                        <h2>Formulario de contacto</h2>
                        <form action="{{ url('/contacto') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mensaje</label>
                            <textarea class="form-control" name="mensaje" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">
                            Enviar mensaje
                        </button>
                        </form>
                    </div>
                </div>
            </div>
            
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>  
    </body>
</html>