@extends('layouts.menu2')


@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/deudas.css')}}" > 
  @endsection  



@section('contenido')
<div class="principal">

    <div class="titulo">
        <p>Pagos</p>
    </div>
        @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
        @endif
        <div class="fila">

            <form action="/ver-pagos" method="POST" autocomplete="off" role="search">
                @csrf
                <div class ="buscador">
                    <input  type="text" class="linea"  name="buscador" placeholder="Escriba un nombre " value="{{$consulta}}">
                    <button type="submit" class="lupa"><img src="{{asset('/dash/assets/lupita_icono.png')}}" class="imagenlupa"> </button>
                </div>
            </form>
            
            
            <div class="exportar">
                
                <a href="/ver-pagos/reporte">
                    <button class="btnExportar">Exportar</button>
                </a>
            </div>
        </div>
        
        <table class="tabla">
            <thead>
              <tr >
                <th class="grillatit">Número</th>
                <th class="grillatit">Usuario</th>
                <th class="grillatit">CI</th>
                <th class="grillatit">Fecha Alquiler</th>
                <th class="grillatit">Pago</th>
                <th class="grillatit">Tipo</th>
      
              </tr>
            </thead>
            <tbody>  
                @foreach ($pagos as $pago)
                    <tr id="id=fila-{{$loop->iteration}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pago->name}}</td>
                        <td>{{$pago->ci}}</td>
                        <td>{{$pago->alquilerfecha}}</td>
                        <td>{{$pago->alquilerprecio}}</td>
                        <td>{{$pago->alquilertipopago}}</td>
                    </tr>
                @endforeach
              
              
            </tbody>
          </table>
    </div>
    
    
    

    @endsection
 