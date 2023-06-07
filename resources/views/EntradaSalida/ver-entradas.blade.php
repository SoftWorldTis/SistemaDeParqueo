@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Registrar Entrada</p>
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
      <form  action="/registrar-entrada" method="get" autocomplete="off" role="search">
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
                    <th>Número</th>
                    <th>Parqueo</th>
                    <th>Usuario</th>
                    <th>Placa</th>
                    <th>Sitio</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Marcar</th>
                  </tr>
                </thead>
              <tbody id="table-body" class="tablaContenido">
                @foreach ($entradas as $alquiler)
                <tr id="id=fila-{{$loop->iteration}}" style="height: 61px;">
                  <td>{{$loop->iteration}}</td>
                  <td>{{$alquiler->estacionamiento->estacionamientozona}}</td>
                  <td>{{$alquiler->user->name}}</td>
                  <td>{{$vehiculo[0]->vehiculoplaca}}</td>
                  <td>{{$alquiler->alquilersitio}}</td>
                  <td>{{ date('d/m/Y', strtotime($alquiler->alquilerfechaini)) }}</td>
                  <td>{{ date('d/m/Y', strtotime($alquiler->alquilerfechafin)) }}</td>
                  <td>
                    <a href="/registrar-entrada/{{$alquiler->alquilerid}}/{{$vehiculo[0]->vehiculoid}}">Marcar</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    @endif
</div>
 
@endsection