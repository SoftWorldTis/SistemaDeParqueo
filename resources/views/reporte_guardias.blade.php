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
            <span class="material-symbols-outlined icono">person</span>
            <span class="label">Ver Deudas</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">person</span>
            <span class="label">Ver Pagos</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">garage_home</span>
            <span class="label">Lista de Parqueos</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <span class="material-symbols-outlined icono">calendar_month</span>
            <span class="label">Ver Costos</span>
        </div>
        <div class="col">
            <span class="material-symbols-outlined icono">prescriptions</span>
            <span class="label">Reporte de Entradas y Salidas</span>
        </div>
@endsection