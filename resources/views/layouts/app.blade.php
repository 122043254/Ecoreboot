<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOREBOOT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireStyles
    <!-- FontAwesome para los íconos de redes sociales -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Asegura que el body ocupe toda la altura de la ventana */
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Hace que el contenido principal ocupe todo el espacio disponible */
        main {
            flex-grow: 1;
        }

        /* Estilo para el footer */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #ddd;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .social-icons a {
            font-size: 20px;
            margin: 0 10px;
            color: white;
        }

        footer .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="{{ route('home') }}">ECOREBOOT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">Acerca de Nosotros</a></li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ route('donar') }}">Donar Dispositivo</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}" onclick="alert('Debes iniciar sesión o registrarte para donar un dispositivo.')">Donar Dispositivo</a>
                        @endauth
                    </li>
                </ul>
                <ul class="navbar-nav ms-3">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="py-4">
        @yield('content')
    </main>
    
    <!-- Footer anclado al final -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <h5>Contacto</h5>
                    <p><strong>Teléfono:</strong> +52 123 456 7890</p>
                    <p><strong>Email:</strong> contacto@ecoreboot.com</p>
                    <p><strong>Dirección:</strong> Calle Ficticia 123, Ciudad, Estado, País</p>
                </div>
                <div class="col-12 col-md-4 mb-3">
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
                <div class="col-12 col-md-4 mb-3">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>