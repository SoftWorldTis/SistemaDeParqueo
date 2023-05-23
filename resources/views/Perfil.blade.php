@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/perfil.css')}}" >
@endsection

@section('contenido')

    <section class="card">

        <div class="card--options">
            <a href="/lobby/EditarCliente/{{$cliente->clienteci}}">Editar Perfil</a>
            <br>
            <a href="/lobby/RenovarAlquiler/{{$cliente->clienteci}}"> Renovar Alquiler</a>


        </div>

        <h2 class="card--title">{{$cliente->clientenombrecompleto}}</h2>

        <div class="card--datos">
            <div class="card--datos--img">
                <img src="{{asset('dash/assets/cliente.png')}}" alt="cliente">
            </div>

            <table class="card--datos--table">
                <tr>
                    <th>Datos</th>
                    <th>Vehiculos</th>
                    <th></th>
                </tr>

                <tr>
                    <td>{{$cliente->clienteci}}</td>
                    <td>{{$vehiculos[0]->vehiculomodelo}}</td>
                    <td>{{$vehiculos[0]->vehiculoplaca}}</td>
                </tr>

                @if(isset($vehiculos[1]))
                <tr>
                    <td>{{$vehiculos[1]->vehiculomodelo}}</td>
                    <td>{{$vehiculos[1]->vehiculoplaca}}</td>
                </tr>
                @endif

                @if(isset($vehiculos[2]))
                <tr>
                    <td>{{$cliente->clientecorreo}}</td>
                    <td>{{$vehiculos[2]->vehiculomodelo}}</td>
                    <td>{{$vehiculos[2]->vehiculoplaca}}</td>
                </tr>
                @else
                <tr>
                    <td>{{$cliente->clientecorreo}}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endif

            </table>
        </div>


        <div class="card--alquiler">
            <h2 class="card--alquiler--title">Alquiler</h2>
            <table class="card--datos--table card--alquiler--table">
                <tr>
                    <th>Fecha Alquiler</th>
                    <th>Parqueo</th>
                    <th>Espacio</th>
                    <th>Precio</th>
                    <th>Estado</th>
                </tr>

                @foreach ($alquileres as $item)
                    <tr>
                        <td>{{$item->alquilerfecha}}</td>
                        <td>{{$item->estacionamientozona}}</td>
                        <td>{{$item->alquilerSitio}}</td>
                        <td>{{$item->alquilerprecio}}</td>

                        @if($item->alquilerestadopago)
                            <td class="td-green">Pagado</td>
                        @else
                            <td class="td-red">Deuda</td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>

    </section>

@endsection

<script>
    function recargar(){
      location.reload()
    }

</script>
