@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/perfil.css')}}" > 
@endsection

@section('contenido')
    <div class="principal">
        <div class="Nombre">
            <p>{{$usuario[0]->clientenombrecompleto}}</p>
        </div>
        <div class="fila">
            <div class ="columna">
                <div class="titulo">Datos</div>
                <div class="datos">{{$usuario[0]->clienteci}}</div >
                <div class="datos">{{$usuario[0]->clientesis}}</div >
                <div class="datos">{{$usuario[0]->clientecorreo}}</div >
            </div>
            
            <div class="columna">
                <div class="titulo">Vehículos</div>
                <div class="vh">
                    <div class="vehiculo">
                        @foreach ($usuario as $usuarioo)
                        <div class="datos">{{$usuarioo->vehiculomodelo}} </div>
                        @endforeach
                        
                    </div>
                    <div class="vehiculo">
                        @foreach ($usuario as $usuarioo)
                            <div class="datos">{{$usuarioo->vehiculoplaca}}</div> 
                        @endforeach
                    </div>
                </div>         
            </div>
        </div>
        <div class="titulo margen">Alquiler</div>
        <table class="tabla">
            <thead>
              <tr >
                <th class="grillatit">Fecha Alquiler</th>
                <th class="grillatit">Parqueo</th>
                <th class="grillatit">Espacio</th>
                <th class="grillatit">Precio</th>
                <th class="grillatit">Estado</th>
                <th class="grillatit">Opción</th>
              </tr>
            </thead>
            <tbody>  
                @foreach ($alquileres as $alquiler)
                    <tr id="id=fila-{{$loop->iteration}}">
                        <td>{{$alquiler->alquilerfecha}}</td>
                        <td>{{$alquiler->estacionamientozona}}</td>
                        <td>{{$alquiler->alquilerSitio}}</td>
                        <td>{{$alquiler->alquilerprecio}}</td>
                        @if ($alquiler->alquilerestadopago == true)
                        <td style="color:#11BE0D">Pagado</td>
                        @else
                        <td style="color: #FC0505">Deuda</td> 
                        @endif
                        <td>
                            <a href="" onclick="recargar()">Pagar</a>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
@endsection

<script>
    function recargar(){
      location.reload()
      console.log("recargado")
    }
    
</script>