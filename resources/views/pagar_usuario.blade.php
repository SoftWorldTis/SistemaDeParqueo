@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')
    <div id="formulario">
        <h2>Armando paredes</h2>
    <div class="row">
        <div class="col">
            <span class="material-symbols-outlined" id="usuario">
                person
                </span>
        </div>
        <div class="col">
            <h4>Datos</h4>
            <span>12221</span><br>
            <span>20190000</span><br>
            <span>usuario@gmail.com</span>
        </div>
        <div class="col">
            <h4>Vehiculos</h4>
            <span>Marca Vehiculo Placa 1</span><br>
            <span>Marca Vehiculo Placa 2</span><br>
            <span>Marca Vehiculo Placa 3</span><br>
        </div>
    </div>
    <h3>ADeudas</h3>
    <table class="table">
        <thead>
            <tr id="encabezado">
                <th>Usuario</th>
                <th>CI</th>
                <th>SIS</th>
                <th>Vehiculo 1</th>
                <th>Vehiculo 2</th>
                <th>Vehiculo 3</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Juan Perez</th>
                <th>12345687</th>
                <th>15793004</th>
                <th>ASD123</th>
                <th>ASD987</th>
                <th>ASD543</th>
                <th>Pagar</th>
        </tr>
        </tbody>
    </table>
    </div>
@endsection