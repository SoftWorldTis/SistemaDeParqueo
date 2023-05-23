@extends('header2')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
@endsection
@section('header')
    <div class="row">
        <div class="col">
            <img src="{{asset('dash/assets/inicioNav.png')}}" width="45">
            <span class="label">Inicio</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/user2 2.png')}}" width="45">
            <span class="label">Rol</span>
            </select>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/user2 2.png')}}" width="45">
            <span class="label">Usuarios</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/parqueoNav.png')}}" width="45">
            <span class="label">Reportes</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/alquiloNav.png')}}" width="45">
            <span class="label">Alquiler</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/registroNav.png')}}" width="45">
            <span class="label">Registrar</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/reclamoNav.png')}}" width="45">
            <span class="label">Reclamos</span>
        </div>
        <div class="col">
            <img src="{{asset('dash/assets/salirNav.png')}}" width="45">
            <span class="label">Salir</span>
        </div>
@endsection
