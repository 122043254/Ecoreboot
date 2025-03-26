@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center fw-bold">ACERCA DE NOSOTROS</h1>

    <div class="row mt-4 align-items-center" style="text-align: center;">
        <div class="col-md-4 mx-20">
            <p class="fs-5">
                ¡Dale una segunda vida a tus dispositivos electrónicos! 
                En <span class="fw-bold">Ecoreboot</span>, creemos en el poder del reciclaje, 
                la reutilización y la reparación para reducir el impacto ambiental de la tecnología. ♻️💻📱
            </p>

            <p class="fs-5 mt-3">
                ¿Tienes computadoras, celulares, tablets o impresoras en desuso? 
                Aquí puedes donarlos, repararlos o encontrar dispositivos reacondicionados 
                listos para un nuevo hogar. Juntos, construimos un futuro más sostenible. 🌱✨
            </p>
        </div>

        <div class="col-md-6">
            <img src="{{ asset('images/reciclaje.jpg') }}" class="img-fluid rounded shadow" 
                alt="Reciclaje de dispositivos">
        </div>
    </div>
</div>
@endsection