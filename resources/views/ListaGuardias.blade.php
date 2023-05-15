@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Guardias</p>
    </div>

    <div class="ParMed">
      <form  action="/lobby/ListaGuardias" method="POST" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
          <input type="text" class="linea" id="buscadorinput" name="buscador" value="" placeholder="Buscar..." >
          <button type="submit" id="search-button"  class="botonBuscar"> 
            <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">
          </button>
        </div>
      </form>
  
      <a href="/lobby/ReporteGuardias/imprimir">
        <button  type="button"  class="botonExportar">
          <p>Exportar</p>
        </button>
      </a>
    </div>
  
    <div  class="ParAb"  >
        <table class="tablaCli" >
            <thead class="tablaTitulos">
              <tr>
                <th>Numero</th>
                <th>Guardia</th>
                <th>CI</th>
                <th>Horario</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody id="table-body" class="tablaContenido">
              @foreach ( $guardias as $key => $guardiass)    
                <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $guardiass->guardianombre }}</td>
                  <td>{{ $guardiass->guardiaci }}</td>
                  <td>{{ $guardiass->guardiahoraentrada }} - {{ $guardiass->guardiahorasalida }}</td>
                  <td>
                    
                    <a href="{{ url('/lobby/EditarGuardia', ['idd' => $guardiass->guardiaci  ]) }}">Editar</a>
                    <form action="/lobby/RegistroGuardias/{{$guardiass->guardiaci}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" style="background: none;border: none;padding:0;cursor: pointer;color: blue; font-size: 24px;" value="Eliminar" />
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        
    </div>

  
</div>


 
@endsection
