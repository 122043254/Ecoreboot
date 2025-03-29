@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="form-container bg-light p-5 rounded shadow" style="max-width: 500px; width: 100%;">
            <h2 class="text-center mb-4">EDITAR PERFIL</h2>
            <form action="guardar_perfil.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Juan Pérez" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" class="form-control" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="tel" name="telefono" class="form-control" placeholder="1234567890" pattern="[0-9]{10}" title="Debe ingresar un número de teléfono válido de 10 dígitos">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Nueva Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Dejar en blanco si no desea cambiar">
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Foto de Perfil</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success w-100">ACTUALIZAR</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
