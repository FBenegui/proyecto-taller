@extends('layouts.app')

@section('title', 'Contacto - Cebar Club')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">Contactanos</h1>
        <p class="text-muted">Estamos aquí para ayudarte. Comunicate con nosotros o dejanos tu consulta.</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-3 text-center rounded-4">
                <i class="bi bi-person-badge display-6 mb-2" style="color: #73a85e;"></i>
                <h5 class="fw-bold">Fabrizzio Benegui</h5>
                <p class="text-muted small">CEO & Co-Fundador</p>
                <div class="small">
                    <p class="mb-1"><i class="bi bi-whatsapp"></i> 3794 05-7316</p>
                    <button class="btn btn-sm btn-outline-success border-0 shadow-none" 
                            onclick="copiarEmail('fabrizziobenegui28@gmail.com')">
                        <i class="bi bi-clipboard"></i> fabrizziobenegui28@gmail.com
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-3 text-center rounded-4">
                <i class="bi bi-person-badge display-6 mb-2" style="color: #73a85e;"></i>
                <h5 class="fw-bold">Valentín Almua</h5>
                <p class="text-muted small">CEO & Co-Fundador</p>
                <div class="small">
                    <p class="mb-1"><i class="bi bi-whatsapp"></i> 3794 97-6333</p>
                    <button class="btn btn-sm btn-outline-success border-0 shadow-none" 
                            onclick="copiarEmail('almuavalentin@gmail.com')">
                        <i class="bi bi-clipboard"></i> almuavalentin@gmail.com
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-3 text-center rounded-4">
                <i class="bi bi-geo-alt display-6 mb-2" style="color: #73a85e;"></i>
                <h5 class="fw-bold">Visitanos</h5>
                <p class="small text-muted">Junin 1533, Corrientes, Argentina</p>
                <p class="small mb-0"><strong>Horario:</strong> Lun-Vie: 9-13 / 17-21</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h4 class="mb-4 fw-bold text-center">Formulario de Contacto</h4>
                <form action="{{ route('contacto.store') }}" method="POST" style="background: none !important; box-shadow: none !important; max-width: 100% !important; padding: 0 !important; margin: 0 !important; border: none !important;">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Tu nombre..." required style="width: 100% !important; margin: 0 !important;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="ejemplo@correo.com" required style="width: 100% !important; margin: 0 !important;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Consulta</label>
                        <textarea class="form-control" name="mensaje" rows="4" placeholder="¿Cómo podemos ayudarte?" required style="width: 100% !important; margin: 0 !important;"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg text-white px-5" style="background-color: #73a85e; margin: 0 !important;">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function copiarEmail(email) {
        // Creamos un elemento temporal invisible
        const tempInput = document.createElement("input");
        tempInput.value = email;
        document.body.appendChild(tempInput);
        
        // Seleccionamos el texto y lo copiamos
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // Para móviles
        
        try {
            document.execCommand("copy");
            alert("¡Email copiado: " + email + "!");
        } catch (err) {
            alert("Error al copiar. Por favor, copialo manualmente.");
        }
        
        // Eliminamos el elemento temporal
        document.body.removeChild(tempInput);
    }
</script>
@endsection