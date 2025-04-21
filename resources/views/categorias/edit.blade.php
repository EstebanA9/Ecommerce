@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h1>Editar categoría</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required>{{ old('descripcion', $categoria->descripcion) }}</textarea><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="{{ route('categorias.index') }}">← Volver al listado</a>
@endsection
