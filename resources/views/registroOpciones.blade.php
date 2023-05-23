@extends('layouts.menu2')



@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/registroOpciones.css')}}" >
@endsection


@section('contenido')
 <div class="herramientas" >

       <!-- contenido  -->

    <div class="rAuto">
        <img src="{{asset('/dash/assets/opAuto.png')}}" class="iconRegistrarA iconRegistrar"  alt="">
        <a id="link" href="{{('/lobby/RegistroParqueos')}}">
        <div class="botonRegistroA botonRegistro">
            <p>Registrar </p>

            <p>parqueos </p>
        </div>
        </a>
    </div>


    <div class="rUser">
        <img src="{{asset('/dash/assets/opUsuario.png')}}" class="iconRegistrarU iconRegistrar " alt="">
        <a id="link" href="{{('/lobby/RegistroUsuarios')}}">
        <div class="botonRegistroU  botonRegistro">
            <p>Registrar</p>

            <p>usuarios</p>

        </div>
        </a>
    </div>
        </div>

                <!-- contenido  -->
@endsection
