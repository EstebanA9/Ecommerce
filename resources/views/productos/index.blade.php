@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
    <div class="container p-0 text-center">
        <h1>Catálogo</h1>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filtro por categoría --}}
        <form method="GET" action="{{ route('productos.index') }}">
            <label for="categoria">Filtrar por categoría:</label>
            <select name="categoria_id" onchange="this.form.submit()">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </form>

        {{-- Botón para crear --}}
        <button class="btn btn-primary my-3">
            <a href="{{ route('productos.create') }}">Agregar producto</a>
        </button>

    </div>


    {{-- Lista de productos --}}
    <div class="container p-0 col-12 ">
        <div class="row">
            @forelse($productos as $producto)
                <div
                    class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column align-items-center border border-2 rounded-3 p-3 my-2">
                    <h2 class="text-center fs-3">{{ $producto->nombre }}</h2>
                    <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                    @if ($producto->imagen_url)
                        <img src="{{ asset('storage/' . $producto->imagen_url) }}" alt="{{ $producto->nombre }}"
                            width="200">
                    @endif

                    <div>
                        <button class="btn btn-primary"><a
                                href="{{ route('productos.show', $producto->id) }}">Ver</a></button>
                        <button class="btn btn-primary"><a
                                href="{{ route('productos.edit', $producto->id) }}">Editar</a></button>

                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                            style="display:inline-block"
                            onsubmit="return confirm('¿Estás seguro de eliminar este producto?')" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="w-100 text-center text-black-50">No hay productos registrados.</p>
            @endforelse
        </div>
    </div>
@endsection