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
            <img src="{{asset('dash/assets/opUsuario.png')}}" width="45">
            <span class="label">Ver Deudas</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/opUsuario.png')}}" width="45">
            <span class="label">Ver Pagos</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/opUsuario.png')}}" width="45">
            <span class="label">Lista de Parqueos</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="{{asset('dash/assets/opUsuario.png')}}" width="45">
            <span class="label">Reporte Mensual</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/opUsuario.png')}}" width="45">
            <span class="label">Reporte de Entradas y Salidas</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/opUsuario.png')}}" width="45">
            <span class="label">Cobrar</span>
    </div>
@endsection
