
@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/lobby.css')}}" >



@endsection
@section('contenido')
<div class="herramientas">
    

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

   
</div>

@endsection 

