@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
    <h1>Editar producto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" required>{{ old('descripcion', $producto->descripcion) }}</textarea><br><br>

        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" value="{{ old('precio', $producto->precio) }}" required><br><br>

        <label>Stock:</label><br>
        <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}" required><br><br>

        <label>Categoría:</label><br>
        <select name="categoria_id" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select><br><br>

        @if ($producto->imagen_url)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $producto->imagen_url) }}" alt="Imagen del producto" width="150">
            </div>
        @endif

        <button type="submit">Actualizar</button>
    </form>

    <br>
    <a href="{{ route('productos.index') }}">← Volver al listado</a>
@endsection