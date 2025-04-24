<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="d-flex flex-column min-vh-100">
    <style>
       a{
        text-decoration: none; 
        color: #fff;
       }

        a.active {
            color: rgb(0, 0, 0);
        }
    </style>

    <nav class="navbar navbar-expand-lg bg-primary px-4">

        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">Compralo.com</a>

            <div class="w-25">

                <ul class="d-flex justify-content-between list-unstyled mb-0">
                    <li><a class="{{ request()->routeIs('inicio') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a></li>
                    <li><a class="{{ request()->routeIs('productos.index') ? 'active' : '' }}" href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a class="{{ request()->routeIs('categorias.index') ? 'active' : '' }}" href="{{ route('categorias.index') }}">Categorías</a></li>
                    <li><a class="{{ request()->routeIs('view-blog') ? 'active' : '' }}" href="{{ route('view-blog') }}">Blog</a></li>
                </ul>

            </div>
        </div>
    </nav>

    <main class="container py-3 d-flex flex-column flex-grow-1 justify-content-center">
        @yield('content')
    </main>
    <footer class="bg-primary text-white text-center py-3" style="background-color: #111;">
        <p class="mb-0">&copy; {{ date('Y') }} Compralo.com</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>