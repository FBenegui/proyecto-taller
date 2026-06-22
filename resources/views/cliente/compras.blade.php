@extends('layouts.app')

@section('title', 'Mis Compras')

@section('content')
<div class="container mt-5">
    <h1 class="h4 mb-4">Mis Compras</h1>

    @if($compras->isEmpty())
        <div class="alert alert-info">No se encontraron compras.</div>
    @else
        <div class="list-group">
            @foreach($compras as $c)
                <a href="{{ route('cliente.compras.show', $c->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <strong>#{{ $c->id }}</strong> — {{ $c->fecha_venta->format('d/m/Y H:i') }}
                        <div class="small text-muted">Total: ${{ number_format($c->total, 0, ',', '.') }}</div>
                    </div>
                    <span class="badge bg-secondary">{{ $c->detalles->sum('cantidad') }} items</span>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
