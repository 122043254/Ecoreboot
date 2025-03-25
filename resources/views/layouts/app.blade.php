<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ route('home') }}">ECOREBOOT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        

            <ul class="navbar-nav">
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-dark">Acerca de Nosotros</a></li>
                <li class="nav-item"><a href="{{ route('donar.informativo') }}" class="nav-link">Donar Dispositivo</a></li>
                <li class="nav-item"><a href="{{ route('privacy') }}" class="nav-link">Política de Privacidad</a></li>
                <li class="nav-item"><a href="{{ route('terms') }}" class="nav-link">Términos y Condiciones</a></li>
            </ul>

            <ul class="navbar-nav ms-3">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle fa-2x me-1"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if(Auth::user()->role === 'administrador')  
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-cog"></i> Panel de Administración</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i> Editar Perfil</a></li>
                                <li><a class="dropdown-item" href="{{ route('donar') }}"><i class="fas fa-gift"></i> Donar Dispositivo</a></li>
                                <li><a class="dropdown-item" href="{{ route('donaciones.panel') }}"><i class="fas fa-list"></i> Panel de Donaciones</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link text-black"><i class="fas fa-user-plus"></i> Registrarse</a>
                    </li>
                @endauth
            </ul>
        
    </div>
</nav>


        
        <main class="py-5 mt-5">
            @yield('content')
        </main>
        
        <footer class="bg-green-800 text-white py-4 mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <h5>Contacto</h5>
                        <p><strong>Teléfono:</strong> +52 123 456 7890</p>
                        <p><strong>Email:</strong> contacto@ecoreboot.com</p>
                        <p><strong>Dirección:</strong> Calle Ficticia 123, Ciudad, Estado, País</p>
                    </div>
                    <div class="col-12 col-md-4 mb-3 text-center">
                        <h5>Síguenos</h5>
                        <a href="https://www.facebook.com/ECOREBOOT" target="_blank" class="text-white mx-2">
                            <i class="fab fa-facebook-f fa-2x"></i>
                        </a>
                        <a href="https://www.twitter.com/ECOREBOOT" target="_blank" class="text-white mx-2">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                        <a href="https://www.instagram.com/ECOREBOOT" target="_blank" class="text-white mx-2">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 mb-3 text-end">
                        <h5>Información Legal</h5>
                        <p>
                            <a href="{{ route('privacy') }}" class="text-white">Política de privacidad</a> | 
                            <a href="{{ route('terms') }}" class="text-white">Términos y condiciones</a>
                        </p>
                        <p>&copy; 2025 ECOREBOOT. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
        });
    </script>
    @livewireScripts
</body>
</html>
