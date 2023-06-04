@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Eliminar Vehículos</p>
        @if ($message = Session::get('Eliminado'))
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
      <form  action="/borrar-vehiculo" method="get" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" name="buscador" value="{{$consulta}}" placeholder="Buscar..." >
            <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>
      </form>
      
    </div>
    @if($usuarios)
      <div  class="ParAb"  >
          <table class="tabla" >
              <thead class="tablaTitulos">
                <tr>
                  <th>Número</th>
                  <th>Usuario</th>
                  <th>Vehículo</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="table-body" class="tablaContenido">
                @foreach ($usuarios as $usuario) 
                    @foreach($usuario->vehiculo as $vehicle)
                    <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                      <td>{{$loop->iteration}}</td>
                      <td>{{$usuario->name}}</td>
                      <td>{{$vehicle->vehiculoplaca }}</td>
                      
                      <td>
                          <a href="/borrar-vehiculo/{{$vehicle->vehiculoid}}">Eliminar</a>
                      </td>
    
                    </tr>  
                  @endforeach  
              @endforeach
              </tbody>
          </table>
      </div>
    @endif
</div>
 
@endsection