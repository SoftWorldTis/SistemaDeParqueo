@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/lobby.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/login.css')}}" >
@endsection

@section('contenido')
    <div class="izquierda">
        <div class="tit">
            <span class="titulo">Iniciar Sesión</span>
        </div>

        <form action="{{route('login')}}" method="Post">
            @csrf
            <div class="Usuario">
                <span class="nombre">Usuario</span>
                <input type="text"  class="linea" name="email_ci">
                @error('email_ci')
                <b class="error">{{$message}}</b>
                @enderror
            </div>
            <div class="Contraseña">
                <label for="password" class="contra">
                    <span>Contraseña:</span>
                </label>
                <input type="password" id="password" name="password" class="linea">
                @error('password')
                <b class="error">{{$message}}</b>
                @enderror
            </div>
            <div class="botones">
                <div type="submit" class="guardar" >
                    <button class="button">
                        <p>Ingresar</p>
                    </button>
                </div>
            </div>
        </form>

    </div>
     
        
@endsection

