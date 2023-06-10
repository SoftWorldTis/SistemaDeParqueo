@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/ingresos.css')}}" > 
@endsection

@section('contenido')
<div class="titulo">
    <div class="ParAr">
        <p>Ingresos de parqueo</p>
    </div>
    @if ($message = Session::get('Registrado'))
            <div class="valido">
                <span>{{$message}}</span>
            </div>
    @endif

<div class="herramientas">
  
    <div class="contenedor-grid">

    <form method="get" action="/ver-ingresos" autocomplete="off" role="search">
    @csrf
  
        
        <div class="ParMed">
            <div class="buscador" id="buscador">
                
                <div class="seleccionparqueo item">
                    <p class="nom">Parqueo:</p>
                    <select name="parqueo" id="parqueo" class="linea" class="parqueo" >
                        
                        <option value="" disabled selected>Seleccione un parqueo</option>
                        @foreach($seleccionar as $selec)
                        <option  class= "linea" value="{{ $selec->estacionamientozona }}">{{ $selec->estacionamientozona }}</option>
                        @endforeach
                        
                        
                     </select>
                     
                 </div>
                    <div class="ini item">
                        <p class="nom">Fecha Inicio:</p>
                        <input type="date" name="FechaInicio" class="linea fecha" id="FechaInicio" value="{{old('FechaInicio')}}" >
                    </div>
                    <div class="fin item">
                        <p class="nom">Fecha fin:</p>
                        <input type="date" name="FechaFin" class="linea fecha" id = "FechaFin" value="{{old('FechaFin')}}" >
                    </div>
                
                
                 <div class="botonbus">

                     <button type="submit" id="search-button"  class="botonBuscar"> 
                         <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">
                        </button>
                    </div>
                  
            </div>
            
            
        </div>
    </form>

    <div class="exportar">
                
        <a href="/ver-ingresos/reporte">
            <button class="btnExportar">Exportar</button>
        </a>
    </div>

</div>
    @if($resultados2&& $monto != 0 )
    <div  class="ParAb">
        <table class="tabla" >
            <thead class="tablaTitulos">
              <tr>
                <th>Número</th>
                <th>Parqueo</th>
                <th>Usuario</th>
                <th>Espacio</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Monto</th>
              </tr>
            </thead>
            <tbody id="table-body" class="tablaContenido">
                <tr>

                   
                    @foreach ($resultados2 as $elemento)
                    <tr>
                        <td>{{ $elemento->alquilerid }}</td>
                        <td>{{ $parking }}</td>
                        <td>{{ $elemento->userid }}</td>
                        <td>{{$elemento->alquilersitio}}</td>
                        <td>{{$elemento->alquilerfechaini}}</td>
                        <td>{{$elemento->alquilerfechafin}}</td>
                        <td>{{$elemento->alquilerprecio}}</td>
                    </tr>
                    @endforeach
                   
                </tr>
        
              </tbody>
                  
  
        </table>
    </div>
    
    <div class="ParFin">
        <div>
            <p class="nom">Total</p>
        </div>
        <div class="din">
            <input type="text" class="linea2" class="dinero" value={{$monto}} readonly >
        </div>
    </div>
    @endif
</div>


 
@endsection
