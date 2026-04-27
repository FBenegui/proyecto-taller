@extends('layouts.app')

@section('title', 'Terminos y usos')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <span class="text-uppercase fw-bold" style="color: var(--verde-mate); letter-spacing: 2px; font-size: 0.9rem;">Aviso Legal</span>
            <h1 class="display-5 fw-bold text-dark mt-2">Términos y <span class="text-mate">Usos</span></h1>
            <p class="lead text-muted mt-3 mx-auto" style="max-width: 700px;">
                Transparencia y confianza en cada mate. Conocé nuestras políticas, garantías y métodos de trabajo para brindarte la mejor experiencia en Cebar Club.
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="accordion shadow-sm" id="accordionTerminos">
                
                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold fs-5 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUno" aria-expanded="true" aria-controls="collapseUno">
                            1. Aviso Legal y Uso del Sitio Web
                        </button>
                    </h2>
                    <div id="collapseUno" class="accordion-collapse collapse show" data-bs-parent="#accordionTerminos">
                        <div class="accordion-body text-muted line-height-lg">
                            El acceso y uso de <strong>Cebar Club</strong> implica la aceptación de los presentes términos. El contenido de este sitio (textos, imágenes, logotipos) es propiedad exclusiva de la marca. Queda prohibida su reproducción sin autorización. Nos reservamos el derecho de modificar la información de los productos, precios y promociones sin previo aviso.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold fs-5 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDos" aria-expanded="false" aria-controls="collapseDos">
                            2. Políticas de Privacidad
                        </button>
                    </h2>
                    <div id="collapseDos" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                        <div class="accordion-body text-muted line-height-lg">
                            Protegemos tu información personal. Los datos solicitados durante el proceso de compra o consultas son estrictamente confidenciales y se utilizan únicamente para procesar pedidos, coordinar envíos y mejorar tu experiencia de usuario. No compartimos bases de datos con terceros bajo ninguna circunstancia.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold fs-5 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
                            3. Procedimientos de Venta
                        </button>
                    </h2>
                    <div id="collapseTres" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                        <div class="accordion-body text-muted line-height-lg">
                            Todos los precios publicados están en Pesos Argentinos (ARS) e incluyen IVA. Las compras están sujetas a disponibilidad de stock. Una vez realizado el pedido, recibirás un correo electrónico de confirmación. Los métodos de pago aceptados incluyen tarjetas de crédito, débito y transferencias bancarias mediante pasarelas seguras.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 border-bottom">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold fs-5 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseCuatro">
                            4. Garantías y Soporte Postventa
                        </button>
                    </h2>
                    <div id="collapseCuatro" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                        <div class="accordion-body text-muted line-height-lg">
                            Nuestros mates y accesorios pasan por un estricto control de calidad. Ofrecemos una garantía de <strong>30 días</strong> por defectos de fabricación (ej. filtraciones en la calabaza o fallas en virolas). La garantía no cubre daños por mal curado, caídas o uso indebido. Nuestro equipo de soporte está disponible vía email para asesorarte en el cuidado de tus productos.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold fs-5 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCinco" aria-expanded="false" aria-controls="collapseCinco">
                            5. Formas de Entrega y Tiempos
                        </button>
                    </h2>
                    <div id="collapseCinco" class="accordion-collapse collapse" data-bs-parent="#accordionTerminos">
                        <div class="accordion-body text-muted line-height-lg">
                            Realizamos envíos a todo el país. Los tiempos estimados de despacho son de 24 a 48 horas hábiles tras la confirmación del pago. El tiempo de tránsito en correo dependerá de tu ubicación (generalmente entre 3 a 7 días hábiles). Te enviaremos un código de seguimiento para que conozcas el estado de tu paquete en todo momento.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection