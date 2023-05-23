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
            <span>usuario@gmail.com</span>
    <table class="table">
        <thead>
            <tr id="encabezado">
                <th>Fecha</th>
                <th>Hora Ingreso</th>
                <th>Hora Salida</th>
                <th>Parqueo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>12/04/2023</th>
                <th>08:15</th>
                <th>20:15</th>
                <th>FCyT</th>
        </tr>
        </tbody>
    </table>
    </div>
@endsection