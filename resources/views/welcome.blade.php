@extends('layouts.app')

@section('content')
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- Imágenes de mejor resolución -->
            <img src="/images/recycle-background1.jpg" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Reciclaje">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100 bg-dark bg-opacity-50">
                <h2 class="fw-bold text-white">BIENVENIDO A ECOREBOOT</h2>
                <p class="text-white">¡Dale una segunda vida a tus dispositivos electrónicos! En Ecoreboot, creemos en el poder del reciclaje, la reutilización y la reparación para reducir el impacto ambiental de la tecnología.</p>
            </div>
        </div>
        <div class="carousel-item">
            <!-- Imágenes de mejor resolución -->
            <img src="/images/recycle-background2.jpg" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Reciclaje">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100 bg-dark bg-opacity-50">
                <h2 class="fw-bold text-white">Reciclaje, reutilización y reparación</h2>
                <p class="text-white">Reducimos el impacto ambiental de la tecnología.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<div class="container text-center my-5">
    <h2 class="fw-bold">¡DA UNA SEGUNDA OPORTUNIDAD!</h2>
    <div class="row mt-4 justify-content-center" x-data="{ openCard: null }">
        @php
            $items = [
                ['img' => 'laptop.png', 'title' => 'Laptops', 'description' => 'Dispositivos portátiles para estudio y trabajo.'],
                ['img' => 'tablet.png', 'title' => 'Tabletas', 'description' => 'Ideales para entretenimiento y educación.'],
                ['img' => 'monitor.png', 'title' => 'Monitores', 'description' => 'Pantallas para mejorar la experiencia visual.'],
                ['img' => 'pc.png', 'title' => 'PC', 'description' => 'Computadoras de escritorio para alto rendimiento.'],
                ['img' => 'keyboard.png', 'title' => 'Teclados', 'description' => 'Periféricos esenciales para cualquier equipo.']
            ];
        @endphp
        
        @foreach($items as $index => $item)
        <div class="col-md-2 mx-2">
            <div class="card shadow-sm p-3" x-on:click="openCard = openCard === {{ $index }} ? null : {{ $index }}" :class="{'border-success': openCard === {{ $index }}}" style="cursor: pointer;">
                <img src="/images/{{ $item['img'] }}" class="card-img-top p-3 transition-transform duration-300 ease-in-out" :style="{ transform: openCard === {{ $index }} ? 'scale(1.05)' : 'scale(1)' }" alt="{{ $item['title'] }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <div x-show="openCard === {{ $index }}" x-transition.opacity class="mt-2 border-top pt-2 text-muted">
                        <p class="mb-0">{{ $item['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection