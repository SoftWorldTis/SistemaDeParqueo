@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Parqueos</p>
    </div>
  
    <div  class="ParMed">
      <form  action="/ver-parqueo" method="POST" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" name="buscador" value="{{$consulta}}" placeholder="Buscar..." >
            <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>
      </form>

       <a href="/ver-parqueo/reporte">
        <button  type="button"  class="botonExportar"> <p> Exportar </p> </button>
       </a>
      
    </div>

    <div  class="ParAb"  >
        <table class="tabla" >
            <thead class="tablaTitulos">
              <tr>
                <th>Número</th>
                <th>Parqueo</th>
                <th>Espacios</th>
                <th>Precio</th>
              </tr>
            </thead>
            <tbody id="table-body" class="tablaContenido">
              @foreach ( $parqueos as $parqueo)    
             
              <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                <td>{{$loop->iteration}}</td>
                <td>{{$parqueo->estacionamientozona}}</td>
                <td>{{$parqueo->estacionamientositios}}</td>
                <td> {{$parqueo->estacionamientoprecio}} </td>

              </tr>
              @endforeach
            </tbody>
        </table>
        
    </div>

</div>

@endsection