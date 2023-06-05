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
        <div class="subTit">
            <p>Parqueo: Fcyt</p>
        </div>
        <div class="fila">

            <form action="/editar-pagos" method="get" autocomplete="off" role="search">
                @csrf
                <div class ="buscador"  id="buscador">
                    <input  type="text" class="linea"  name="buscador" placeholder="Escriba un nombre " value="{{$consulta}}">
                    <button type="submit" class="lupa"><img src="{{asset('/dash/assets/lupita_icono.png')}}" class="imagenlupa"> </button>
                </div>
            </form>
            
            
            <div class="exportar">
                
                <a href="/editar-pagos/imprimir">
                    <button class="btnExportar">Exportar</button>
                </a>
            </div>
        </div>
        @if($pagos)
        <table class="tabla">
            <thead>
              <tr >
                <th class="grillatit">Número</th>
                <th class="grillatit">Usuario</th>
                <th class="grillatit">CI</th>
                <th class="grillatit">Fecha Alquiler</th>
                <th class="grillatit">Deuda</th>
                <th class="grillatit">Cobrar</th>
      
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
                        <td>
                            <a href="/editar-pago/">Editar</a>
                          </td>
                    </tr>
                @endforeach
              
              
            </tbody>
          </table>
          @endif
    </div>
    
    

    @endsection
   
