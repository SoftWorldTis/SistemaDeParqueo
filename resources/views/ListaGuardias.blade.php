@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaGuardias.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Usuarios</p>
    </div>
  
    <div  class="ParMed">
      <form  action="/lobby/ListaGuardias" method="POST" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" name="buscador" value="{{$searchValue}}" placeholder="Buscar..." >
            <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>
      </form>

       <a href="/lobby/ReporteGuardias/imprimir">
        <button  type="button"  class="botonExportar"> <p> Exportar </p> </button>
       </a>
      
    </div>

    <div  class="ParAb"  >
        <table class="tablaCli" >
            <thead class="tablaTitulos">
              <tr>
                <th>Numero</th>
                <th>Usuario</th>
                <th>CI</th>
                <th>Horario</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody id="table-body" class="tablaContenido">
              @foreach ( $guardias as $key => $guardiass)    
             
              <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                <td>{{ $key + 1 }}</td>
                <td>{{$guardiass->guardarnombrecompleto}}</td>
                <td>{{$guardiass->guardiaci}}</td>
                <td>{{$guardiass->guardiasis}}</td>
                <td>{{$guardiass->horario}}</td>
                <td>
                  <a href="{{ url('/lobby/EditarCliente', ['idd' => $clientess->clienteci  ]) }}">Editar</a>
                  <a href="#">Eliminar</a>
                  
      
                </td>

              </tr>
              @endforeach
            </tbody>
        </table>





        
    </div>

  
</div>


 
@endsection
