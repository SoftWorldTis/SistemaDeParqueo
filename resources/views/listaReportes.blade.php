@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaReportes.css')}}" > 
@endsection



@section('contenido')
<div class="herramientas">
    

    <div class="deudas">
        <div class="r1">
          <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconDeudas" alt="">
            <a id="link" href="{{('/lobby/ListaGuardias')}}">
                <div class="botonDeudas">
                    <p>Ver Deudas</p>
                </div>
            </a>
        </div>
    </div>


    <div class="pagos">
        <div class="r2">
          <img src="{{asset('/dash/assets/documento icono 1.png')}}" class="iconPagos" alt="">
            <a id="link" href="{{('/lobby/ListaClientes')}}">
                <div class="botonPagos">
                    <p>Ver Pagos</p>
                </div>
            </a>
         </div>
    </div>
   
</div>



@endsection

