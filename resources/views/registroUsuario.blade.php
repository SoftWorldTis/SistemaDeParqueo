@extends('layouts.menu2')
@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/registroUsuarios.css')}}" >
@endsection



@section('contenido')

<div class="herramientas">
       <!-- contenido  -->
      
    <div class="rCliente">
        <img src="{{asset('/dash/assets/cliente.png')}}" class="iconRegistrarU iconRegistrar"  alt="">
        <div class="botonRegistroC botonRegistro">
            <p>Registrar </p>

            <p>cliente </p>
        </div>
    </div>


    <div class="rGuardia">
        <img src="{{asset('/dash/assets/guardia.png')}}" class="iconRegistrarG  iconRegistrar " alt="">
        <div class="botonRegistroG  botonRegistro">
            <p>Registrar</p>
 
            <p>guardia</p>
        </div>
    </div>

</div>
      
     
           <!-- contenido  -->




@endsection