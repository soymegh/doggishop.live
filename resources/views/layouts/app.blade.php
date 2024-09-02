<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOGGISHOP - Tu Tienda de Mascotas</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Agrega tus estilos personalizados aquí -->
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.6.0-web/css/all.min.css')}}">

    <style>
        .navbar-brand img {
            max-width: 80px;
            /* Ajusté el tamaño del logo */
            height: auto;
        }

        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        footer {
            margin-top: auto;
        }

        @if (Auth::user())
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            border-right: 1px solid #dee2e6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebar:hover {
            width: 220px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
            border-radius: 10px;
            transform: translateX(10px);
        }

        main {
            margin-left: 200px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar:hover + main {
            margin-left: 220px;
        }

        @endif
    </style>

</head>

<body>
    <header>
        <!-- Encabezado con barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://doggishop.live/Logo.png" alt="DOGGISHOP Logo" class="d-inline-block align-top" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        @if (Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs.post') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">Acerca de</a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                {{-- verificar si el tipo de usuario es guest --}}
                                @if (Auth::user()->role == 'guest')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home.showCart', Auth::user()->id) }}">Mis compras</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @if(Auth::user())
    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'user')
    <div class="sidebar">
        <a href="/">Inicio</a>
        <a href="{{ route('home') }}">Dashboard</a>
        <a href="{{ route('categories.index') }}">Categorías</a>
        <a href="{{ route('pets.index') }}">Mascotas</a>
        <a href="{{ route('products.index') }}">Productos</a>
        <a href="{{ route('pet_type.index') }}">Tipos de Mascotas</a>
        <a href="{{ route('providers.index') }}">Proveedores</a>
        <a href="{{ route('blogs.index') }}">Blog</a>
        <a href="{{ route('discounts.index') }}">Descuentos</a>
        <a href="{{ route('events.index') }}">Eventos</a>
    </div>
    @endif
    @endif

    <main role="main">
        @yield('content')
    </main>

    <footer class="footer bg-light pt-3 pb-3">
        <!-- Pie de página -->
        <div class="container text-center">
            <span class="text-muted">Desarrollado por FMM: <a href="https://github.com/GhostlyCoder20">Francisco</a>, <a href="https://github.com/MarlieRamirez">Marlie</a>, <a href="https://github.com/soymegh">Marvin</a></span>
        </div>
    </footer>

    <!-- Scripts de Bootstrap (jQuery y Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
    <script>

    
        /*dar un alerta de error con estilos*/
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        })
    </script>
    @endif

    @if (session('success'))
    <script>
        /*dar un alerta de exito con estilos*/
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '{{ session('success') }}',
        })
    </script>
    @endif
</body>

</html>
