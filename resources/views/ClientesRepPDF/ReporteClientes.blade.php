<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        *{
            color: black;
            font-family: 'Inter', sans-serif;
            font-style: normal;
        }
        .titulo{
            text-align: center;
            font-size: 2rem;
            color: #0A1C44;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="titulo">
        <h1>Lista de Clientes</h1>
    </div>
    <table class="tabla">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Usuario</th>
            <th class="grillatit">CI</th>
            <th class="grillatit">SIS</th>
            <th class="grillatit">Vehiculo 1</th>
            <th class="grillatit">Vehiculo 2</th>
            <th class="grillatit">Vehiculo 3</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ( $clientes as $key => $clientess)    
             
              <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                <td>{{ $key + 1 }}</td>
                <td>{{$clientess->clientenombrecompleto}}</td>
                <td>{{$clientess->clienteci}}</td>
                <td>{{$clientess->clientesis}}</td>
                <td>{{$clientess->vehiculo1}}</td>
                <td>{{$clientess->vehiculo2}}</td>
                <td>{{$clientess->vehiculo3}}</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>

              </tr>
              @endforeach

        </tbody>
      </table>

</body>
</html>