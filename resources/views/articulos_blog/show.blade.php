@extends('layouts.app')

@section('content')
    <div class="card text-center">
        <div class="card-body">
            @if ($articulo->imagen_url)
                <img src="{{ asset('storage/' . $articulo->imagen_url) }}" alt="Imagen del articulo" width="200">
            @endif
            <h5 class="card-title mt-3">{{ $articulo->titulo }}</h5>
            <p class="card-text">{{ $articulo->contenido }}</p>
            <p><strong>Autor: </strong>{{ $articulo->autor }}</p>
            <a class="btn btn-primary" href="{{ route('articulos_blog.edit', $articulo->id) }}">Editar</a>
        </div>
        <div class="card-footer text-muted">
            {{ $articulo->fecha_publicacion }}
        </div>
    </div>

    {{-- Comentarios del articulo --}}
    <div class="container bg-light-subtle rounded-3 border border-secondary p-5 mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <span>Comentarios</span>
            <a class="btn btn-primary" href="{{ route('articulos_blog.comentarios.create', $articulo->id) }}">Añadir
                Comentario</a>
        </div>
        @forelse ($articulo->comentarios as $comentario)
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-dark text-white d-flex justify-content-between">
                    <span>{{ $comentario->nombre_usuario }}</span>
                    <span>{{ $comentario->email }}</span>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $comentario->contenido }}</p>
                        <footer class="blockquote-footer mt-2">
                            <span class="fs-6">Publicado {{ $comentario->created_at }}</span>
                        </footer>
                    </blockquote>
                    <div class="d-flex justify-content-end gap-2">
                        <a class="btn btn-primary" href="{{ route('articulos_blog.comentarios.edit',  [$articulo->id, $comentario->id]) }}">Editar</a>
                        <form action="{{ route('articulos_blog.comentarios.destroy', [$articulo->id, $comentario->id]) }}"
                            method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este comentario?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="w-100 text-center text-black-50 mt-3">No hay comentarios</p>
        @endforelse
@endsection