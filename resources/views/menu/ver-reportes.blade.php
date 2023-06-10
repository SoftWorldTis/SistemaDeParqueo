@extends('layouts.menu2')



@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/reportes.css')}}" >
@endsection

@section('contenido')
<div class="herramientas" style="width: 100%">
    <div class="fila1">
        @can('ver-deuda')
        <div class="usuarios">
            <div class="r3">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconUsuarios" alt="">
               <a id="link" href="{{('/ver-deuda')}}">
                  <div class="botonUsuarios">
                    <p>Ver Deudas</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan


        @can	('ver-pagos')
        <div class="usuarios">
            <div class="r3">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}"class="iconUsuarios" alt="">
               <a id="link" href="{{('/ver-pagos')}}">
                  <div class="botonUsuarios">
                    <p>Ver Pagos</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan
        @can	('ver-usuario')

        <div class="usuarios">
            <div class="r4">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconReportes" alt="">
                <a id="link" href="{{('/ver-usuario')}}">
                    <div class="botonReportes">
                        <p>Ver Usuarios</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan

    </div>
    <div class="fila2">

        @can	('ver-parqueo')
       <div class="usuarios">
        <div class="r2">
            <img src="{{asset('/dash/assets/documento icono 1.png')}}"class="iconAlquilar" alt="">
            <a id="link" href="{{('/ver-parqueo')}}">
                <div class="botonAlquilo">
                    <p>Ver Parqueos</p>
                </div>
            </a>
        </div>
    </div>
       @endcan

       @can	('ver-vehiculos')
        <div class="usuarios">
            <div class="r1">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/ver-vehiculo')}}">
                    <div class="botonRegistro">
                        <p>Ver Vehiculos</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        @can('ver-caja')
        <div class="usuarios">
            <div class="r3">
                <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconUsuarios" alt="">
               <a id="link" href="{{('/ver-ingresos')}}">
                  <div class="botonUsuarios">
                    <p>Reporte de Ingresos</p>
                  </div>
               </a>
            </div>
        </div>
        @endcan

        @can	('ver-salidas')
        <div class="usuarios">
            <div class="r1">
            <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/ver-entradas-salidas')}}">
                    <div class="botonRegistro">
                        <p>Reporte de E/S</p>
                    </div>
                </a>
            </div>
        </div>
        @endcan
        
        @can	('editar-deuda')
        <div class="usuarios">
            <div class="r1">
            <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
                <a id="link" href="{{('/editar-deuda')}}">
                    <div class="botonRegistro">
                        <p>Cobrar</p>
                    </div>
                </a>
            </div>
        </div>    
        @endcan

     

        
    </div>




</div>

@endsection
