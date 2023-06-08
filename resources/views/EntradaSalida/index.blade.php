@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/entradasalida.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Ingresos y Salidas</p>
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
        <div class="item">
            <form  action="/ver-entradas-salidas" method="post" autocomplete="off" role="search">
                @csrf
                <div class="buscador" id="buscador">
                    <div class="item">
                        <p class="nom inline">Parqueo:</p>
                        <select name="parqueo"  class="linea sitio" value="{{old('parqueo')}}" >
                            <option class= "linea" value="">Seleccione un parqueo</option>
                            @foreach ($parqueos as $parqueo)
                            @if ($request->parqueo == $parqueo->estacionamientoid)
                            <option class= "linea" value="{{$parqueo->estacionamientoid}}" selected>{{$parqueo->estacionamientozona}}</option>
                            @else
                            <option class= "linea" value="{{$parqueo->estacionamientoid}}">{{$parqueo->estacionamientozona}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="item">
                        <p class="nom inline">Fecha Inicio:</p>
                        @if($request)
                        <input type="date" class="linea" class="fecha"  name="fechainicio" value="{{$request->fechainicio}}" >   
                        @else
                        <input type="date" class="linea" class="fecha"  name="fechainicio" value="{{old('fechainicio')}}" >
                        @endif
                        
                        @error('fechainicio')
                        <div class="error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="item">
                        <p class="nom inline">Fecha Fin:</p>
                        @if ($request)
                        <input type="date" class="linea" class="fecha"  name="fechafin" value="{{$request->fechafin}}" >    
                        @else
                        <input type="date" class="linea" class="fecha"  name="fechafin" value="{{old('fechafin')}}" >  
                        @endif
                        
                        @error('fechafin')
                        <div class="error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    
                    <button  type="submit" id="search-button"  class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
                </div>
              </form>
        </div>
    
        <div class="item">
            <a href="{{ route('reporteES', ['parqueo' => $request->input('parqueo'), 'fechainicio' => $request->input('fechainicio'), 'fechafin' => $request->input('fechafin')]) }}">
                <button type="button" class="botonExportar">
                    <p>Exportar</p>
                </button>
            </a>
        </div>
       
    </div>
    @if ($entradas)

      <div  class="ParAb"  >
          <table class="tabla" >
                <thead class="tablaTitulos">
                  <tr>
                    <th>Número</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Sitio</th>
                    <th>Vehículo</th>
                    <th>Ingreso</th>
                    <th>Salida</th>
                  </tr>
                </thead>
              <tbody id="table-body" class="tablaContenido">
                @foreach ($entradas as $es)
                <tr id="id=fila-{{$loop->iteration}}" style="height: 61px;">
                  <td>{{$loop->iteration}}</td>
                  <td>{{ date('d/m/Y', strtotime($es->entradatime)) }}</td>
                  <td>{{$es->alquiler->user->name}}</td>               
                  <td>{{$es->alquiler->alquilersitio}}</td>
                  <td>{{$es->vehiculo->vehiculoplaca}}</td>
                  <td>{{date('H:i A', strtotime($es->entradatime))}}</td>
                  <td>{{date('H:i A', strtotime($es->salidatime))}}</td>
                  
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    
      @endif
</div>
 
@endsection