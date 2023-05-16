@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/deudas.css')}}" > 
@endsection

@section('contenido')
    <div class="principal">
        <div class="titulo">
            <p>Deudas</p>
        </div>
        <div class="subTit">
            <p>Parqueo: Fcyt</p>
        </div>
        <div class="fila">

            <form action="/lobby/ListaDeudas" method="POST" autocomplete="off" role="search">
                @csrf
                <div class ="buscador">
                    <input  type="text" class="linea"  name="buscador" placeholder="Escriba un nombre " value="{{$consulta}}">
                    <button type="submit" class="lupa"><img src="{{asset('/dash/assets/lupita_icono.png')}}" class="imagenlupa"> </button>
                </div>
            </form>
            
            
            <div class="exportar">
                
                <a href="/lobby/ListaDeudas/imprimir">
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
                <th class="grillatit">Deuda</th>
                <th class="grillatit">Opciones</th>
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
                        <td>
                            <a href="/lobby/Perfil/{{$deuda->cliente_clienteci}}">Ver Perfil</a>
                            <a href="/lobby/ListaDeudas/{{ $deuda->alquilerid }}" onclick="recargar()">Cobrar</a>
                        </td>
                    </tr>
                @endforeach
              
              
            </tbody>
          </table>
    </div>
@endsection
<script>
    function recargar(){
      location.reload()
      console.log("recargado")
    }
    
</script>