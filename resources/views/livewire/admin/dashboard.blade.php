<head>
    <style>
        .nav-tabs .nav-link {
            color: #155724;
            transition: background-color 0.3s ease;
        }
        .nav-tabs .nav-link:hover {
        color: #155724;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('Panel Administrativo') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased d-flex flex-column min-vh-100">
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
                    <li class="nav-item"><a class="nav-link text-dark">Panel administrativo</a></li>
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
                                    <li><a class="dropdown-item" href="{{ route('donar.informativo') }}"><i class="fas fa-gift"></i> Donar Dispositivo</a></li>
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

        <br><br><br>
            <div class="container mt-5">

            <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dispositivos-tab"
                        data-bs-toggle="tab" data-bs-target="#dispositivos" type="button" role="tab">
                        Dispositivos
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="donaciones-tab"
                        data-bs-toggle="tab" data-bs-target="#donaciones" type="button" role="tab">
                        Solicitudes de Donativos
                    </button>
                </li>
            </ul>


                <div class="tab-content mt-3" id="dashboardTabsContent">
                    <!-- TAB 1: Dispositivos -->
                    <div class="tab-pane fade show active" id="dispositivos" role="tabpanel">
                        <livewire:admin.tabla-dispositivos />
                    </div>

                    <!-- TAB 2: Donaciones -->
                    <div class="tab-pane fade" id="donaciones" role="tabpanel">
                        <livewire:admin.donaciones wire:key="donaciones-tabla" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('#dashboardTabs .nav-link');

        // Al cargar por primera vez, aplica estilos a la activa
        tabs.forEach(tab => {
            if (tab.classList.contains('active')) {
                tab.classList.add('bg-success', 'text-white');
            }
        });

        // Detectar cambio de pestaña y aplicar colores
        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', function (event) {
                // Quitar estilos a todas
                tabs.forEach(t => t.classList.remove('bg-success', 'text-white'));

                // Agregar solo a la actual
                event.target.classList.add('bg-success', 'text-white');
                });
            });
        });
    </script>
    @livewireScripts

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
