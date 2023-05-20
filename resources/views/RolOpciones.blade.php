
@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/lobby.css')}}" >



@endsection
@section('contenido')
<div class="herramientas">
  
    @if ($resultado->contains('rf_funcionalidadid', 1))
    <div class="rol">
        <div class="r6">
            <img src="{{ asset('/dash/assets/documento icono 1.png') }}" class="iconRegistrar" alt="">
            <a id="link" href="{{ '/lobby/RegistroRol' }}">
                <div class="botonRegistro">
                    <p>Crear Rol</p>
                </div>
            </a>
        </div>
    </div>
@endif

@if ($resultado->contains('rf_funcionalidadid', 2))
    <div class="rol">
        <div class="r6">
            <img src="{{ asset('/dash/assets/documento icono 1.png') }}" class="iconRegistrar" alt="">
            <a id="link" href="{{ '/lobby/EditarRol' }}">
                <div class="botonRegistro">
                    <p>Editar Rol</p>
                </div>
            </a>
        </div>
    </div>
@endif

@endsection 

