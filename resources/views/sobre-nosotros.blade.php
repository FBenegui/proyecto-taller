@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold display-4" style="color: #73a85e;">Sobre Nosotros</h1>
        <p class="lead text-muted">La historia detrás de cada mate</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                
                <h4 class="fw-bold mb-3">Nuestros Orígenes</h4>
                <p class="mb-4 text-secondary lh-lg">¡Hola! Somos Fabrizzio y Valentín, los creadores detrás de <strong>Cebar Club</strong>. Todo empezó como empiezan las mejores ideas: compartiendo un mate en nuestra querida Corrientes. Entre termo y termo, nos dimos cuenta de que el mate es mucho más que una infusión; es nuestra pausa, nuestro compañero de estudio, el testigo de las mejores charlas y el punto de encuentro con los nuestros.</p>
                
                <h4 class="fw-bold mb-3">Nuestra Trayectoria</h4>
                <p class="mb-4 text-secondary lh-lg">Lo que comenzó como una búsqueda personal pronto se convirtió en un proyecto real. Así nació Cebar Club, una tienda que hoy busca llegar a las manos de materos de todas partes. Cada producto que vas a encontrar aquí fue pensado, probado y seleccionado por nosotros mismos.</p>

                <div class="bg-light p-4 rounded-4 mb-4">
                    <h4 class="fw-bold mb-3" style="color: #73a85e;">Nuestros Objetivos</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: #73a85e;"></i><strong>Elevar tu experiencia:</strong> Cada cebada es un momento especial.</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: #73a85e;"></i><strong>Calidad accesible:</strong> Democratizar el acceso a mates premium.</li>
                        <li><i class="bi bi-check-circle-fill me-2" style="color: #73a85e;"></i><strong>Fomentar la comunidad:</strong> Valorar la tradición y el buen diseño.</li>
                    </ul>
                </div>

                <h4 class="fw-bold mb-3">El Equipo</h4>
                <div class="d-flex flex-column gap-3">
                    <div class="border-start border-4 ps-3" style="border-color: #73a85e;">
                        <p class="mb-1 fw-bold">Fabrizzio - Desarrollo de Producto</p>
                        <p class="text-secondary small">Búsqueda incansable de materiales y estándares de calidad técnica.</p>
                    </div>
                    <div class="border-start border-4 ps-3" style="border-color: #73a85e;">
                        <p class="mb-1 fw-bold">Valentín - Diseño y Experiencia</p>
                        <p class="text-secondary small">Mente creativa, comunicación y experiencia de compra impecable.</p>
                    </div>
                </div>
                <div class="mt-5 text-center p-4 bg-white rounded-4 shadow-sm border">
                    <h5 class="mb-3">¿Necesitás una pausa?</h5>
                    <button id="btnCebar" class="btn btn-lg text-white px-5 rounded-pill shadow-sm" style="background-color: #73a85e;">
                        <i class="bi bi-cup-hot me-2"></i> Cebar un mate virtual
                    </button>
                    <div id="mensajeMate" class="mt-3 fw-bold" style="color: #73a85e;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('btnCebar').addEventListener('click', function() {
        const btn = this;
        const msg = document.getElementById('mensajeMate');
        
        btn.disabled = true;
        btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Cebando...';
        msg.textContent = '';

        setTimeout(() => {
            btn.innerHTML = '<i class="bi bi-check-lg me-2"></i> ¡Mate listo!';
            msg.textContent = '¡Ya podés disfrutar de tu pausa! Seguí navegando y recargá energías.';
        }, 2000);
    });
</script>
@endsection