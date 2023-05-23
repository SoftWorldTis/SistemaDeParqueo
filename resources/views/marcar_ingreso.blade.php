@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')
    <div id="formulario">
        <h2>Marcar Ingreso</h2>
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
                <th>Usuario</th>
                <th>CI</th>
                <th>SIS</th>
                <th>Vehiculo</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>Samuel Borda</th>
                <th>987654</th>
                <th>201300833</th>
                <th>ADBTRE</th>
                <th>Marcar</th>
            </tr>
        </tbody>
    </table>
    </div>
@endsection