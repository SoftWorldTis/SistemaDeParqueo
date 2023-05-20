@extends('layouts.menu2')



@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/registroFuncionalidad.css')}}" >

@endsection
@section('forminicio')
    <form action="/lobby/#" method="post">
        @csrf

@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Crear funcionalidad</p>
        @if ($message = Session::get('Registrado'))
            <div class="valido">
                <span>{{$message}}</span>
            </div>
        @endif
    </div>
    <div class="Nombre Pi" >
        <input type="text" id="zona" class="linea"name="funcionalidadnombre" onkeyup="lettersOnly(this)" onblur="verificar(this)" value="{{old('funcionalidadnombre')}}"placeholder="Nombre funcionalidad">
        @error('guardianombre')
            <div class="error">
                {{$message}}
            </div>
        @enderror
    </div >
    <div class="Nombre Pi" >
        <input type="text" id="zona" class="linea"name="ruta" onkeyup="lettersOnly(this)" onblur="verificar(this)" value="{{old('ruta')}}"placeholder="Ruta">
        @error('guardianombre')
            <div class="error">
                {{$message}}
            </div>
        @enderror
    </div >
</div>
    @endsection

    @section('botones')
    <div class="AbBotones">
        <a id="link" href="{{('/lobby')}}">
        <button  type="button" class="cancelar button">

        <p>Cancelar</p>
        </button>

        </a>
        <button type="submit" class="guardar button">

        <p>Guardar</p>

        </button>
        </div>
    </form>


<script src="{{asset('/dash/scripts/parqueo.js')}}"> </script>
@endsection
