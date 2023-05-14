@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Guardias</p>
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
                  <a href="#">Eliminar</a>
                  
      
                </td>

              </tr>
              @endforeach
            </tbody>
        </table>





        
    </div>

  
</div>


 
@endsection
