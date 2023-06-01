
@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/lobby.css')}}" >



@endsection
@section('contenido')
<div class="herramientas">
    <div class="fila1">
        @can('crear-rol')
        <div class="usuarios">
            <div class="r3">
              <img src="{{asset('/dash/assets/user 3.png')}}" class="iconUsuarios" alt="">
               <a id="link" href="{{('/lobby/#')}}">
                  <div class="botonUsuarios">
                    <p>Rol</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan


        @can('ver-usuario')
        <div class="usuarios">
            <div class="r3">
              <img src="{{asset('/dash/assets/user 3.png')}}" class="iconUsuarios" alt="">
               <a id="link" href="{{('/ver-usuario')}}">
                  <div class="botonUsuarios">
                    <p>Usuarios</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan

        @can('ver-reporte')
        <div class="usuarios">
            <div class="r4">
              <img src="{{asset('/dash/assets/p 1.png')}}" class="iconReportes" alt="">
                <a id="link" href="{{('/lobby/ListaReportes')}}">
                    <div class="botonReportes">
                        <p>Reportes</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan

    </div>
    <div class="fila2">

       @can('crear-alquiler')
       <div class="usuarios">
        <div class="r2">
        <img src="{{asset('/dash/assets/dia-de-pago 1 .png')}}" class="iconAlquilar" alt="">
            <a id="link" href="{{('/lobby/Alquiler')}}">
                <div class="botonAlquilo">
                    <p>Alquiler</p>
                </div>
            </a>
        </div>
    </div>
       @endcan

        @can('crear-reclamos')
        <div class="usuarios">
            <div class="r1">
            <img src="{{asset('/dash/assets/Reclamos.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/lobby/#')}}">
                    <div class="botonRegistro">
                        <p>Reclamos</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan

        @can('crear-parqueo')
        <div class="usuarios">
            <div class="r1">
            <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/lobby/RegistroOpciones')}}">
                    <div class="botonRegistro">
                        <p>Registrar</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        
        @auth
        <div class="usuarios">
            <div class="r1">
            <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/ver-perfil')}}">
                    <div class="botonRegistro">
                        <p>Ver Perfil</p>
                    </div>
                </a>
            </div>
        </div>    
        @endauth

        <div class="usuarios">
            <div class="r5">
            <img src="{{asset('/dash/assets/cerrar-sesion 1.png')}}" class="iconSalir" alt="">

            <a id="link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="botonSalir">
                    <p>Salir</p>
                </div>
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
        </div>

        
    </div>




</div>

@endsection

