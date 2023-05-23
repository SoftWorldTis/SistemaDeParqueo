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
    <h3>Alquiler</h3>
    <table class="table">
        <thead>
            <tr id="encabezado">
                <th>Fecha alquiler</th>
                <th>Parqueo</th>
                <th>Espacio</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>Juan Perez</th>
                <th>12345687</th>
                <th>ASD123</th>
                <th>Deuda</th>
            </tr>
            <th>1</th>
            <th>Adrian Rodriguez</th>
            <th>12345687</th>
            <th>ASD123</th>
            <th>Pagado</th>
        </tr>
        </tbody>
    </table>
    </div>
@endsection