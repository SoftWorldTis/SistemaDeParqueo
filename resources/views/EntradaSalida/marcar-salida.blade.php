@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Marcar Salida</p>
        @if ($message = Session::get('Mensaje'))
          <div class="valido">
              <span>{{$message}}</span>
          </div>
        @endif

        @if ($message = Session::get('Error'))
        <div class="error">
            <span>{{$message}}</span>
        </div>
      @endif
    </div>
  
    <div  class="ParMed">
      <form  action="/registrar-salida" method="get" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" name="buscador" value="{{$consulta}}" placeholder="Buscar placa" >
            <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>
      </form>
      
    </div>
    @if($vehiculo)
      <div  class="ParAb"  >
          <table class="tabla" >
                <thead class="tablaTitulos">
                  <tr>
                    <th>Fecha</th>
                    <th>Parqueo</th>
                    <th>Usuario</th>
                    <th>Placa</th>
                    <th>Sitio</th>
                    <th>Ingreso</th>
                    <th>Marcar Salida</th>
                  </tr>
                </thead>
              <tbody id="table-body" class="tablaContenido">
                @foreach ($entradas as $es)
                <tr id="id=fila-{{$loop->iteration}}" style="height: 61px;">
                  <td>{{ date('d/m/Y', strtotime($es->entradatime)) }}</td>
                  <td>{{$es->alquiler->estacionamiento->estacionamientozona}}</td>
                  <td>{{$es->alquiler->user->name}}</td>
                  <td>{{$es->vehiculo->vehiculoplaca}}</td>
                  <td>{{$es->alquiler->alquilersitio}}</td>
                  <td>{{date('H:i A', strtotime($es->entradatime))}}</td>
                  <td>
                    <a href="/registrar-salida/{{$es->esid}}">Marcar</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    @endif
</div>
 
@endsection