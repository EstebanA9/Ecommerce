@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
    <h1>{{ $producto->nombre }}</h1>

    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>

    @if($producto->imagen_url)
    <img src="{{ asset('storage/' . $producto->imagen_url) }}" alt="Imagen del producto" width="200">
    @endif

    <br><br>
    <a href="{{ route('productos.index') }}">← Volver al listado</a>
@endsection