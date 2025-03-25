@extends('layouts.app') <!-- Asegúrate de que este sea el nombre correcto de tu plantilla base -->

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Donar Dispositivo</h1>
    <p class="text-center">¡Gracias por considerar donar un dispositivo a ECOREBOOT!</p>
    <p class="text-center">Su donación ayudará a reducir el desperdicio electrónico y a proporcionar dispositivos a quienes los necesiten.</p>

    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">¿Qué Dispositivos Aceptamos?</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Computadoras de Escritorio y Portátiles</strong>
                    <p>Materiales reciclables: Plástico, metal, vidrio, circuitos impresos.</p>
                </li>
                <li class="list-group-item">
                    <strong>Tabletas</strong>
                    <p>Materiales reciclables: Plástico, vidrio, metales preciosos.</p>
                </li>
                <li class="list-group-item">
                    <strong>Teléfonos Móviles</strong>
                    <p>Materiales reciclables: Plástico, metales preciosos, circuitos impresos.</p>
                </li>
                <li class="list-group-item">
                    <strong>Accesorios (Teclados, Ratones, Monitores)</strong>
                    <p>Materiales reciclables: Plástico, metal, circuitos impresos.</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Beneficios de Reciclar Dispositivos Electrónicos</h5>
        </div>
        <div class="card-body">
            <ul>
                <li>Reduce la contaminación ambiental al evitar que los dispositivos terminen en vertederos.</li>
                <li>Recupera materiales valiosos que pueden ser reutilizados en la fabricación de nuevos productos.</li>
                <li>Contribuye a la economía circular, promoviendo un uso más sostenible de los recursos.</li>
                <li>Ayuda a proporcionar dispositivos a personas y comunidades que los necesitan.</li>
            </ul>
        </div>
    </div>

</div>
@endsection