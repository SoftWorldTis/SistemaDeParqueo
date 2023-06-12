@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/roles.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Editar Roles</p>
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
      <form  action="/editar-rol" method="get" autocomplete="off" role="search">
        @csrf
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" name="buscador" value="{{$consulta}}" placeholder="Buscar..." >
            <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>
      </form>
      
    </div>
    @if($roles)
      <div  class="ParAb"  >
          <table class="tabla" >
              <thead class="tablaTitulos">
                <tr>
                  <th>Número</th>
                  <th>Rol</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody id="table-body" class="tablaContenido">
                @foreach ($roles as $rol) 
                    <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                      <td>{{$loop->iteration}}</td>
                      <td>{{$rol->name}}</td>
                      
                      <td>
                          <a href="/editar-rol/{{$rol->id}}">Editar</a>
                      </td>
    
                    </tr>    
              @endforeach
              </tbody>
          </table>
      </div>
    @endif
</div>
 
@endsection