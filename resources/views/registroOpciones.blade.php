@extends('layouts.menu2')

@section('contenido')


       <!-- contenido  -->
<a id="link" href="{{('/lobby/RegistroParqueos')}}"> 
    <div class="rAuto">
        <img src="{{asset('/dash/assets/opAuto.png')}}" class="iconRegistrarA iconRegistrar"  alt="">
        <div class="botonRegistroA botonRegistro">
            <p>Registrar </p>

            <p>parqueos </p>
        </div>
    </div>
</a>
<a id="link" href="{{('/lobby/RegistroUsuarios')}}">
    <div class="rUser">
        <img src="{{asset('/dash/assets/opUsuario.png')}}" class="iconRegistrarU iconRegistrar " alt="">
        <div class="botonRegistroU  botonRegistro">
            <p>Registrar</p>
 
            <p>usuarios</p>
        </div>
    </div>
</a>


      
     
           <!-- contenido  -->




@endsection
