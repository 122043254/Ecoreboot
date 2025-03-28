@extends('layouts.app') <!-- Asegúrate de que este sea el nombre correcto de tu plantilla base -->

@section('content')
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
        <div class="container my-5 p-5 rounded shadow-lg" style="max-width: 800px; background-color: #ffffff;">
            <h1 class="text-center mb-4 text-success fw-bold h3">Formulario de Donación de Dispositivos</h1>
            <p class="text-center">Complete el siguiente formulario para donar uno o más dispositivos a ECOREBOOT.</p>
            <p class="text-center text-muted">Gracias por su apoyo en la reducción del desperdicio electrónico y en la ayuda
                a quienes lo necesitan.</p>
            <br>
            <style>
                .shadow-lg {
                    box-shadow: 0 0 30px rgba(0, 0, 0, 0.3) !important;
                }
                .input-highlight {
                    border: 2px solid #28a745 !important;
                    background-color: #e9f7ef !important;
                    border-radius: 5px;
                }
                .btn-success:hover {
                    background-color: #218838;
                    border-color: #1e7e34;
                }
                .form-label {
                    color: #495057;
                }
            </style>

            <!-- Mostrar errores con SweetAlert -->
            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en el formulario',
                            html: `<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                            confirmButtonColor: '#28a745'
                        });
                    });
                </script>
            @endif

            <!-- Mostrar éxito con SweetAlert -->
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Donación exitosa!',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#28a745',
                            timer: 3000,
                            timerProgressBar: true
                        });
                    });
                </script>
            @endif

            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Información del Donante</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('donar.dispositivos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Información del Dispositivo</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="tipo_dispositivo" class="form-label">Tipo de Dispositivo</label>
                                    <select class="form-control" id="tipo_dispositivo" name="tipo_dispositivo" required>
                                        <option value="">Selecciona un tipo</option>
                                        <option value="computadora">Computadora</option>
                                        <option value="tableta">Tableta</option>
                                        <option value="telefono">Teléfono</option>
                                        <option value="accesorios">Accesorios</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción del Estado del
                                        Dispositivo</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" min="1"
                                        required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar Donación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para confirmación de envío -->
    <script>
        document.getElementById('donacionForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';

            Swal.fire({
                title: '¿Confirmar donación?',
                text: "¿Estás seguro de que deseas enviar esta información?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si confirma, enviar el formulario
                    e.target.submit();
                } else {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Enviar Donación';
                }
            });
        });
    </script>
@endsection
