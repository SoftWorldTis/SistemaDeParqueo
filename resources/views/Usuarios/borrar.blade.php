@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Eliminar Usuario</p>
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
      <form  action="/borrar-usuario" method="get" autocomplete="off" role="search">
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
                  <th>Numero</th>
                  <th>Usuario</th>
                  <th>CI</th>
                  <!--<th>Rol</th>-->
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="table-body" class="tablaContenido">
                @foreach ( $usuarios as $usuario)    
              
                <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                  <td>{{$loop->iteration}}</td>
                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->ci}}</td>
                  <!--@foreach ($usuario->getRoleNames() as $nombreRol)
                      <td>{{$nombreRol}}</td>
                  @endforeach-->
                <td>
                  <a href="/borrar-usuario/{{$usuario->id}}">Eliminar</a>
                </td>

                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    @endif
</div>
 
@endsection