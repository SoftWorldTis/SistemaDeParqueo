@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Usuarios</p>
    </div>
  
    <div  class="ParMed">
      <form  action="/lobby/ListaClientes" method="POST" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" name="buscador" value="{{$searchValue}}" placeholder="Buscar..." >
            <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>
      </form>

       <a href="/lobby/ReporteClientes/imprimir">
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
                <th>SIS</th>
                <th>Vehiculo 1</th>
                <th>Vehiculo 2</th>
                <th>Vehiculo 3</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody id="table-body" class="tablaContenido">
              @foreach ( $clientes as $key => $clientess)    
             
              <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                <td>{{ $key + 1 }}</td>
                <td>{{$clientess->clientenombrecompleto}}</td>
                <td>{{$clientess->clienteci}}</td>
                <td>{{$clientess->clientesis}}</td>
                <td>{{$clientess->vehiculo1}}</td>
                <td>{{$clientess->vehiculo2}}</td>
                <td>{{$clientess->vehiculo3}}</td>
                <td>
                  <a href="{{ route('lobby.editarcliente', ['idd' => $clientess->clienteci]) }}" class="editarclie">Editar</a>
                  <form action="{{ route('lobby.borrarcliente', ['idd' => $clientess->clienteci]) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit"  class="borrarclie" value="Eliminar">
                </form>
                  
      
                </td>

              </tr>
              @endforeach
            </tbody>
        </table>





        
    </div>

  
</div>


 
@endsection
