@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <h1>Crear nueva categoría</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" placeholder="Nombre de la categoría" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" placeholder="Descripción de la categoría" required></textarea><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('categorias.index') }}">← Volver al listado</a>
@endsection
