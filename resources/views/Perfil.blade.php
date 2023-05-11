@extends('layouts.menu2')
<div>
    <img src="" alt="ImagenDePerfil">
    <p>Datos</p>
    <p>{{$cliente->clienteci}}</p>
    <p>{{$cliente->clientesis}}</p>
    <p>{{$cliente->clientecorreo}}</p>
    <p>Vehiculos</p>
    @foreach ($vehiculos as $vehiculo)
        <p>{{$vehiculo->vehiculomodelo}} - {{$vehiculoplaca}}</p>
    @endforeach
    <p>Alquiler</p>
    <table>
        <thead>
            <tr>
                <th>Fecha Alquiler</th>
                <th>Parqueos</th>
                <th>Espacio</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alquileres as $alquiler)
                <th>
                    <td>{{$alquiler->alquilerfecha}}</td>
                    <td>{{$alquiler->}}</td>
                    <td>{{$alquiler->alquilersitio}}</td>
                    <td>{{$alquiler->alquilerprecio}}</td>
                    <td>{{$alquiler->alquilerestadopago}}</td>
                    <td> <a href="{{ url('/Alquiler') }}">Pagar</a></td>
                </th>
            @endforeach
        </tbody>
    </table>
    @foreach ($alquileres as $alquiler)
        
    @endforeach
</div>