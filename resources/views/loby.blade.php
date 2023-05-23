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
            <img src="{{asset('dash/assets/user 3.png')}}" width="45">
            <span class="label">Rol</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/user 3.png')}}" width="45">
            <span class="label">Usuarios</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/p 1.png')}}" width="45">
            <span class="label">Ver Reportes</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="{{asset('dash/assets/dia-de-pago 1.png')}}" width="45">
            <span class="label">Alquilar</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/queja 1rec.png')}}" width="45">
            <span class="label">Reclamos</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/documento icono 1.png')}}" width="45">
            <span class="label">Registrar</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/cerrar-sesion 1.png')}}" width="45">
            <span class="label">Salir</span>
        </div>
    </div>
@endsection
