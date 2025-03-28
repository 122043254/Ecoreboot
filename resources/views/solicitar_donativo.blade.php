@extends('layouts.app')

@section('content')
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f8f9fa;">
        <div class="container my-5 p-5 rounded shadow-lg" style="max-width: 800px; background-color: #ffffff;">
            <h1 class="text-center mb-4 text-success fw-bold h3">Solicitar Donativo</h1>
            <p class="text-center text-muted"><em>Complete el siguiente formulario para solicitar un donativo de dispositivos
                    electrónicos.</em></p>
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
            @if($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en el formulario',
                            html: `<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                            confirmButtonColor: '#28a745'
                        });
                    });
                </script>
            @endif
            
            <!-- Mostrar éxito con SweetAlert -->
            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Solicitud enviada!',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#28a745',
                            timer: 3000,
                            timerProgressBar: true
                        });
                    });
                </script>
            @endif

            <div class="d-flex justify-content-center">
                <form action="{{ route('solicitar_donativo') }}" method="POST" style="max-width: 600px; width: 100%;"
                    id="donativoForm">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-bold">Nombre Completo</label>
                        <input type="text" class="form-control input-highlight" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre completo" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" class="form-control input-highlight" id="email" name="email"
                            placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="telefono" class="form-label fw-bold">Teléfono</label>
                        <input type="text" class="form-control input-highlight" id="telefono" name="telefono"
                            placeholder="Ingrese su número de teléfono" required>
                    </div>
                    <div class="mb-4">
                        <label for="tipo_dispositivo" class="form-label fw-bold">Tipo de Dispositivo</label>
                        <select class="form-select input-highlight" id="tipo_dispositivo" name="tipo_dispositivo" required>
                            <option value="" selected disabled>Seleccione una opción</option>
                            <option value="computadora">Computadora</option>
                            <option value="tableta">Tableta</option>
                            <option value="telefono">Teléfono</option>
                            <option value="accesorios">Accesorios</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold">Descripción del Dispositivo</label>
                        <textarea class="form-control input-highlight" id="descripcion" name="descripcion" rows="3"
                            placeholder="Describa el dispositivo que necesita" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" id="submitBtn">Enviar Solicitud</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para SweetAlert2 -->
    <script>
        document.getElementById('donativoForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
            
            Swal.fire({
                title: '¿Confirmar solicitud?',
                text: "¿Estás seguro de que deseas enviar esta solicitud de donativo?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar',
                backdrop: `
                    rgba(40, 167, 69, 0.2)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                `
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si confirma, enviar el formulario
                    e.target.submit();
                } else {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Enviar Solicitud';
                }
            });
        });
    </script>
@endsection