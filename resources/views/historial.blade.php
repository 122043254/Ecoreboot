@extends('layouts.app')

@section('content')
<style>
    .nav-tabs .nav-link {
            background-color: transparent; 
            color: #4CAF50; 
            border-color: transparent; 
        }

        .nav-tabs .nav-link.active {
            background-color: #4CAF50; 
            color: white; 
        }
</style>
<div class="container mt-5">
    <h1 class="text-center mb-4 text-success fw-bold h3">Historial de Dispositivos</h1>

    <!-- Navegación entre Donaciones y Solicitudes -->
    <ul class="nav nav-tabs" id="historialTabs">
        <li class="nav-item">
            <a class="nav-link active" id="donaciones-tab" data-bs-toggle="tab" href="#donaciones">Donaciones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="solicitudes-tab" data-bs-toggle="tab" href="#solicitudes">Solicitudes</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <!-- Donaciones -->
        <div class="tab-pane fade show active" id="donaciones">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Dispositivo</th>
                        <th>Estado</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>20/03/2025</td>
                        <td>Laptop HP</td>
                        <td>Entregado</td>
                        <td>Funcionando, con cargador</td>
                    </tr>
                    <tr>
                        <td>15/02/2025</td>
                        <td>Smartphone Samsung</td>
                        <td>Pendiente</td>
                        <td>Pantalla con grietas</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Solicitudes -->
        <div class="tab-pane fade" id="solicitudes">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Dispositivo</th>
                        <th>Estado</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10/03/2025</td>
                        <td>Monitor LG 22"</td>
                        <td>Aprobado</td>
                        <td>Uso escolar</td>
                    </tr>
                    <tr>
                        <td>05/02/2025</td>
                        <td>Tablet Lenovo</td>
                        <td>Rechazado</td>
                        <td>No disponible</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection