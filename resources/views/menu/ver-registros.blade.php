@extends('layouts.menu2')



@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/reportes.css')}}" >
@endsection

@section('contenido')
<div class="herramientas">
    <div class="fila1">
        @can	('crear-usuario')
        <div class="usuarios">
            <div class="r3">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconUsuarios" alt="">
               <a id="link" href="{{('/crear-usuario')}}">
                  <div class="botonUsuarios">
                    <p>Registrar Usuario</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan


        @can	('crear-parqueo')
        <div class="usuarios">
            <div class="r3">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}"class="iconUsuarios" alt="">
               <a id="link" href="{{('/crear-parqueo')}}">
                  <div class="botonUsuarios">
                    <p>Registrar Parqueo</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan
      

    </div>
    <div class="fila2">

        @can	('crear-alquiler')
       <div class="usuarios">
        <div class="r2">
            <img src="{{asset('/dash/assets/documento icono 1.png')}}"class="iconAlquilar" alt="">
            <a id="link" href="{{('/crear-alquiler')}}">
                <div class="botonAlquilo">
                    <p>Registrar Alquiler</p>
                </div>
            </a>
        </div>
    </div>
       @endcan

       @can	('crear-vehiculos')
        <div class="usuarios">
            <div class="r1">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/crear-vehiculo')}}">
                    <div class="botonRegistro">
                        <p>Registrar Vehiculo</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan




</div>

@endsection
