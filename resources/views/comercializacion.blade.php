@extends('layouts.app')

@section('title', 'Comercialización')

@section('content')
    <div class="container mt-5 mb-5">
        <span class="seccion-titulo-label">¿Dónde comprarnos?</span>
        <h2 class="seccion-titulo">Canales de Venta</h2>
        <p class="seccion-subtitulo">Encontrá nuestros productos en el canal que más te convenga.</p>

        <div class="row g-4 mb-5">

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="canal-card destacada">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="canal-icon">
                            <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        </div>
                        <span class="canal-badge-destacada">Recomendado</span>
                    </div>
                    <h3>Tienda Online</h3>
                    <p>Comprá desde donde estés, las 24 hs. Envíos a todo el país con seguimiento en tiempo real.</p>
                    <span class="canal-badge">Envío a todo el país</span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="canal-card">
                    <div class="canal-icon">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3>Distribuidores</h3>
                    <p>Red de distribuidores autorizados en distintas regiones para compra local.</p>
                    <span class="canal-badge">Compra local</span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="canal-card">
                    <div class="canal-icon">
                        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    </div>
                    <h3>Ferias y Eventos</h3>
                    <p>Participamos en ferias del mate donde podés conocer y comprar en persona.</p>
                    <span class="canal-badge">Experiencia presencial</span>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="canal-card">
                    <div class="canal-icon">
                        <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                    </div>
                    <h3>Venta por Mayor</h3>
                    <p>Precios especiales para revendedores. Escribinos para una cotización a medida.</p>
                    <span class="canal-badge">Para revendedores</span>
                </div>
            </div>

        </div>

    </div>
@endsection