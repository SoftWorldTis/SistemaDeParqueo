@extends('header2')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/loby.css')}}">
@endsection
@section('header')
    <h1>BIENVENIDO, AL SISTEMA DE PARKING</h1>
@endsection
@section('main')
    <div class="row">
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Ver deudas</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Ver pagos</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Lista de parqueos</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Reporte mensual</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Reporte de entradas y salidas</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Cobrar</span>
        </div>
    </div>
@endsection