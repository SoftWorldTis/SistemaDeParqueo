
@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/lobby.css')}}" >



@endsection
@section('contenido')
<div class="herramientas">
  {{--
    <div class="registrar">
        <div class="r1">
          <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
            <a id="link" href="{{('/lobby/RegistroOpciones')}}">
                <div class="botonRegistro">
                    <p>Registrar</p>
                </div>
            </a>
        </div> 
    </div>


    <div class="alquiler">
        <div class="r2">
          <img src="{{asset('/dash/assets/dia-de-pago 1 .png')}}" class="iconAlquilar" alt="">
            <a id="link" href="{{('/lobby/Alquiler')}}">
                <div class="botonAlquilo">
                    <p>Alquiler</p>
                </div>
            </a>
         </div>
    </div>

    
    <div class="usuarios">
        <div class="r3">
          <img src="{{asset('/dash/assets/user 3.png')}}" class="iconUsuarios" alt="">
           <a id="link" href="{{('/lobby/ListaUsuarios')}}">
              <div class="botonUsuarios">
                <p>Usuarios</p>
              </div>
           </a>
        </div>
    </div>

   
    <div class="reportes">
        <div class="r4">
          <img src="{{asset('/dash/assets/p 1.png')}}" class="iconReportes" alt="">
            <a id="link" href="{{('/lobby/ListaReportes')}}">
                <div class="botonReportes">
                    <p>Reportes</p>
                </div>
            </a>
        </div>
    </div>


    <div class="salir">
        <div class="r5">
          <img src="{{asset('/dash/assets/cerrar-sesion 1.png')}}" class="iconSalir" alt="">
            <a id="link" href="{{('/inicio')}}">
                <div class="botonSalir">
                    <p>Salir</p>
                </div>
            </a>
         </div>
    </div>

  
</div>
--}}

@php
    $valor1Encontrado = false;
    $valor2Encontrado = false;
@endphp

@foreach($resultado as $item)
    @if($item->rf_funcionalidadid == 1)
        @php
            $valor1Encontrado = true;
        @endphp
    @elseif($item->rf_funcionalidadid == 2)
        @php
            $valor2Encontrado = true;
        @endphp
    @endif
@endforeach

@if($valor1Encontrado && $valor2Encontrado)
            <div class="rol">
                <div class="r6">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                    <a id="link" href="{{('/lobby/RegistroOpciones')}}">
                        <div class="botonRegistro">
                            <p>Rol</p>
                        </div>
                    </a>
                </div>
            </div>
@elseif ($valor1Encontrado  && $valor2Encontrado==false )
            <div class="rol">
                <div class="r6">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                    <a id="link" href="{{('/lobby/RegistroRol')}}">
                        <div class="botonRegistro">
                            <p>Crear Rol</p>
                        </div>
                    </a>
                </div>
            </div>
@elseif ($valor1Encontrado==false  && $valor2Encontrado ) 
            <div class="rol">
                <div class="r6">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                    <a id="link" href="{{('/lobby/EditarRol')}}">
                        <div class="botonRegistro">
                            <p>Editar Rol</p>
                        </div>
                    </a>
                </div>
            </div>          
@endif 




@endsection 

