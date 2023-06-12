@extends('layouts.menu2')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/registroReclamo.css')}}" >  
@endsection

@section('contenido')


    <div class="tit">
        <p>Lista de Reclamos</p>
        @if ($message = Session::get('Registrado'))
          <div class="valido">
              <span>{{$message}}</span>
          </div>
        @endif

    </div>
    <div class="cartillas-container">
        @foreach($reclamos as $reclamo)
            <div class="cartilla">
                <div class="titulo-container">
                <p class="titulo">{{ $reclamo->reclamotitulo }}</p>
                <p class="titulo">Fecha : {{ $reclamo->reclamofecha }}</p>
                </div>
                <div class="despor">

                <p class="descripcion">{{ $reclamo->reclamodescripcion }}</p>
                <p class="reclamousuario">Realizado por: {{ $reclamo->usuario->name }}</p>
                </div>     
            </div>
        @endforeach
    </div>
   

 
@endsection