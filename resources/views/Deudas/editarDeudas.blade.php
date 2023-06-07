@extends('layouts.menu2')


@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/deudas.css')}}" > 
  @endsection  


@section('contenido')
<div class="principal">

    <div class="titulo">
        <p>Cobrar</p>
    </div>
        @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
        @endif
  
        <div class="fila">

            <form action="/editar-deuda" method="get" autocomplete="off" role="search">
                @csrf
                <div class ="buscador"  id="buscador">
                    <input  type="text" class="linea"  name="buscador" placeholder="Escriba un nombre " value="{{$consulta}}">
                    <button type="submit" class="lupa"><img src="{{asset('/dash/assets/lupita_icono.png')}}" class="imagenlupa"> </button>
                </div>
            </form>
            
            
            <div class="exportar">
                
                <a href="/editar-deuda/reporte">
                    <button class="btnExportar">Exportar</button>
                </a>
            </div>
        </div>
        @if($deudas)
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
                @foreach ($deudas as $deuda)
                    <tr id="id=fila-{{$loop->iteration}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$deuda->name}}</td>
                        <td>{{$deuda->ci}}</td>
                        <td>{{$deuda->alquilerfecha}}</td>
                        <td>{{$deuda->alquilerprecio}}</td>
                        <td>
                        
                           <a href="/editar-deuda/{{$deuda->alquilerid }}" onclick="recargar()">Cobrar</a>
                        </td>
                    </tr>
                @endforeach
              
              
            </tbody>
          </table>
          @endif
    </div>
    
    

    @endsection
   
