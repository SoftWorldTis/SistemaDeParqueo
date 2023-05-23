@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')
    <div id="formulario">
        <h2>Reporte de Parqueo</h2>
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
                <th>Parqueo</th>
                <th>Usuario</th>
                <th>Espacio</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>Samuel Borda</th>
                <th>FCyT</th>
                <th>12</th>
                <th>25/05/2023</th>
                <th>12/07/2023</th>
                <th>100</th>
            </tr>
        </tbody>
    </table>
    </div>
@endsection