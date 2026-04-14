<!DOCTYPE html>
<html>
    <head>
        <title>Sobre mí</title>
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
        <a class="nav-link {{ request()->path() == 'exito' ? 'active' : '' }}" href="/exito">Exito</a>
         </div>
        </div>
        </nav>
    </header>
<div class="container mt-4">


        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                     <h1 class="card-title">Sobre mí</h1>
                         <p><b>Nombre:</b> Juan Pérez</p>
                         <p><b>Edad:</b> 22 años</p>
                         <p><b>De dónde soy:</b> Corrientes, Argentina</p>
                         <p><b>Me gustaría trabajar en:</b> Desarrollo de software</p>
                         <p><b>Expectativas del curso:</b> Aprender Laravel</p>
                         <p><b>Hobbies:</b> Programar y deportes</p>
                </div>
            </div>
                
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>