@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')
    <div id="formulario">
        <h2>Registro de Entradas y Salidas</h2>
    <h5>Parqueo: FCyT</h5>
    <div class="row">
        <div class="col col-8">
            <input type="search" name="" id="" class="inputB" placeholder="Escriba un nombre o CI">
            <span class="material-symbols-outlined">search</span>
        </div>
        <div class="col">
            <button class="btn" id="exportar">Exportar</button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr id="encabezado">
                <th>Numero</th>
                <th>Espacio</th>
                <th>Cliente</th>
                <th>Vehiculo</th>
                <th>Hora Ingreso</th>
                <th>Hora Salida</th>
                <th>Estado Alquiler</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>12</th>
                <th>Samuel Borda</th>
                <th>123XDG</th>
                <th>12:45</th>
                <th>20:15</th>
                <th>Disponible</th>
            </tr>
            <th>1</th>
            <th>25</th>
            <th>Samuel Borda</th>
            <th>123Xhg</th>
            <th>12:45</th>
            <th>20:15</th>
            <th>Ocupado</th>
        </tr>
        </tbody>
    </table>
    </div>
@endsection