<div class="container mt-5">
    <h5 class="fw-bold">Solicitudes de Donativos</h5>
    @if (session()->has('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Total Dispositivos</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($donaciones as $donacion)
                    <tr>
                        <td>{{ $donacion->id_donacion }}</td>
                        <td>{{ $donacion->usuario->name ?? 'N/A' }}</td>
                        <td>{{ $donacion->fecha }}</td>
                        <td>{{ $donacion->total_dispositivos }}</td>
                        <td>{{ $donacion->activo ? 'Aceptado' : 'Rechazado' }}</td>
                        <td>
                        <button class="btn btn-sm btn-warning" wire:click="editarDonacion({{ $donacion->id_donacion }})">
                            Editar
                        </button>
                        <button
                            class="btn btn-sm btn-danger"
                            x-data
                            @click="
                                Swal.fire({
                                    title: '¿Eliminar donación?',
                                    text: 'Esta acción no se puede deshacer.',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#6c757d',
                                    confirmButtonText: 'Sí, eliminar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $wire.eliminarDonacion({{ $donacion->id_donacion }});
                                        Swal.fire({
                                            title: 'Eliminado',
                                            text: 'La donación ha sido eliminada.',
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        });
                                    }
                                });
                            "
                        >
                            Eliminar
                        </button>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay donaciones registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalEditarDonacion" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="editarModalLabel">Editar Donación</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Fecha</label>
              <input type="date" class="form-control" wire:model="fecha">
            </div>
            <div class="mb-3">
              <label class="form-label">Total de Dispositivos</label>
              <input type="number" class="form-control" wire:model="total_dispositivos">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" wire:model="activo" id="checkActivo">
              <label class="form-check-label" for="checkActivo">Activa</label>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button wire:click="actualizarDonacion" class="btn btn-success">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
    document.addEventListener('confirmar-eliminacion', function (event) {
        const id = event.detail.id;

        Swal.fire({
            title: '¿Eliminar donación?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Llama al método del componente Livewire
                Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'))
                    .call('eliminarDonacion', id);

                Swal.fire({
                    title: 'Eliminado',
                    text: 'La donación ha sido eliminada.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    });

    document.addEventListener('abrir-modal-edicion', function () {
        const modal = new bootstrap.Modal(document.getElementById('modalEditarDonacion'));
        modal.show();
    });

    document.addEventListener('cerrar-modal-edicion', function () {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarDonacion'));
        modal.hide();
    });

    document.addEventListener('notificar-edicion', function () {
        Swal.fire({
            title: 'Actualizado',
            text: 'La donación fue actualizada correctamente.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    });
</script>

