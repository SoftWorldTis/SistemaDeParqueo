
@extends('layouts.menu')

@section('contenido')

    
<a id="link" href="{{('/lobby/RegistroOpciones')}}">
    <div class="registrar">
        <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconRegistrar" alt="">
        <div class="botonRegistro">
            <p>Registrar</p>
        </div>
    </div>
</a>
<a id="link" href="{{('/lobby/Alquiler')}}">
    <div class="alquiler">
        <img src="{{asset('/dash/assets/dia-de-pago 1 .png')}}" class="iconAlquilar" alt="">
        <div class="botonAlquilo">
            <p>Alquiler</p>
        </div>
    </div>
</a>
    
@endsection