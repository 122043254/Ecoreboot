<div> {{-- 👈 Esto encapsula TODO dentro de un único root --}}
    <h5 class="fw-bold">Total de dispositivos: {{ $totalDispositivos }}</h5>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-success">
                <tr>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dispositivos as $dispositivo)
                    <tr>
                        <td>{{ $dispositivo->nombre }}</td>
                        <td>{{ $dispositivo->modelo ?? 'Sin modelo' }}</td>
                        <td>{{ $dispositivo->descripcion ?? 'Sin descripción' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay dispositivos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
