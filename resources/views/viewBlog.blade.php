@extends('layouts.app')

@section('content')
    <div class="container-fluid col-12 p-0">
        <div class="row text-center mb-3">
            <h2>Bienvenido a Nuestro Blog</h2>
            <p class="text-black-50">¿Qué deseas hacer?</p>
        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-center gap-3">
                <div class="card col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <p class="card-text">En nuestro blog encontraras cientos de articulos sobre distintos temas. Crea
                            miles de categorias</p>
                        <a class="btn btn-success" href="{{ route('categorias_blog.index') }}">Ver Categorias</a>
                    </div>
                </div>
                <div class="card col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">Articulos</h5>
                        <p class="card-text">En nuestro blog encontraras cientos de articulos sobre distintos temas. Crea
                            miles de categorias</p>
                        <a class="btn btn-success" href="{{ route('articulos_blog.index') }}">Ver Articulos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection