@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaUsuarios.css')}}" > 
@endsection



@section('contenido')
<div class="herramientas">
    

    <div class="guardias">
        <div class="r1">
          <img src="{{asset('/dash/assets/guardia.png')}}" class="iconGuardias" alt="">
            <a id="link" href="{{('/lobby/ListaGuardias')}}">
                <div class="botonGuardias">
                    <p>Guardias</p>
                </div>
            </a>
        </div>
    </div>


    <div class="clientes">
        <div class="r2">
          <img src="{{asset('/dash/assets/cliente.png')}}" class="iconClientes" alt="">
            <a id="link" href="{{('/lobby/ListaClientes')}}">
                <div class="botonClientes">
                    <p>Clientes</p>
                </div>
            </a>
         </div>
    </div>
   
</div>



@endsection

