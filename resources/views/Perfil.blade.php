@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/perfil.css')}}" > 
@endsection

@section('contenido')

    <section class="card">

        <div class="card--options">
            <a href="">Editar Perfil</a>
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

                @foreach ($vehiculos as $item)
                    <tr>
                        <td>{{$item->vehiculoid}}</td>
                        <td>{{$item->vehiculomodelo}}</td>
                        <td>{{$item->vehiculoplaca}}</td>
                    </tr>    
                @endforeach

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
                    <th>Opcion</th>
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

                        <td>
                            <a href="">Pagar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </section>

@endsection