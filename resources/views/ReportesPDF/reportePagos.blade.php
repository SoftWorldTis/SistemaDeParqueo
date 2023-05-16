<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
             font-family: 'Inter', sans-serif;
             font-style: normal;
             min-height: 100vh;
             position:relative;
             padding-bottom: 3em;
         }
         .titulo{
             text-align: center;
             font-size: 2rem;
             color: #1042ad;
         }
         table{
            text-align:center
        }
        thead{
            border: 1px solid black;
        }
     </style>
</head>
<body>
    <div class="titulo" >
        <h3>Lista de Pagos</h3>
    </div>
    <table style="width: 100%;">
        <thead>
          <tr >
                <th class="grillatit">Número</th>
                <th class="grillatit">Usuario</th>
                <th class="grillatit">CI</th>
                <th class="grillatit">Fecha Alquiler</th>
                <th class="grillatit">Saldado</th>
                <th class="grillatit">Tipo</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($deudas as $deuda)
                <tr id="id=fila-{{$loop->iteration}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$deuda->clientenombrecompleto}}</td>
                    <td>{{$deuda->cliente_clienteci}}</td>
                    <td>{{$deuda->alquilerfecha}}</td>
                    <td>{{$deuda->alquilerprecio}}</td>
                    <td>{{$deuda->alquilertipopago}}</td>
                </tr>
            @endforeach


        </tbody>
      </table>

</body>
</html>
 72 changes: 72 additions & 0 deletions72  
resources/views/listaPagos.blade.php
@@ -0,0 +1,72 @@
@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/deudas.css')}}" > 
@endsection

@section('contenido')
    <div class="principal">
        <div class="titulo">
            <p>Pagos</p>
        </div>
        <div class="subTit">
            <p>Parqueo: Fcyt</p>
        </div>
        <div class="fila">

            <form action="/lobby/ListaPagos" method="POST" autocomplete="off" role="search">
                @csrf
                <div class ="buscador">
                    <input  type="text" class="linea"  name="buscador" placeholder="Escriba un nombre " value="{{$consulta}}">
                    <button type="submit" class="lupa"><img src="{{asset('/dash/assets/lupita_icono.png')}}" class="imagenlupa"> </button>
                </div>
            </form>


            <div class="exportar">

                <a href="/lobby/ListaPagos/imprimir">
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
                <th class="grillatit">Saldado</th>
                <th class="grillatit">Tipo</th>
              </tr>
            </thead>
            <tbody>  
                @foreach ($deudas as $deuda)
                    <tr id="id=fila-{{$loop->iteration}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$deuda->clientenombrecompleto}}</td>
                        <td>{{$deuda->cliente_clienteci}}</td>
                        <td>{{$deuda->alquilerfecha}}</td>
                        <td>{{$deuda->alquilerprecio}}</td>
                        <td>{{$deuda->alquilertipopago}}</td>
                    </tr>
                @endforeach


            </tbody>
          </table>
    </div>
@endsection