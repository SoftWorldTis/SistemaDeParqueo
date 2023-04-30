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
            color: #5d0000;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="titulo">
        <h3>Lista de Deudas</h3>
    </div>
    <table style="width: 100%;">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Usuario</th>
            <th class="grillatit">CI</th>
            <th class="grillatit">Fecha Alquiler</th>
            <th class="grillatit">Deuda</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($deudas as $deuda)
                <tr id="id=fila-{{$loop->iteration}}">
                    <td>1</td>
                    <td>{{$deuda->cliente_clienteci}}</td>
                    <td>{{$deuda->cliente_clienteci}}</td>
                    <td>{{$deuda->alquilerfecha}}</td>
                    <td>{{$deuda->alquilerprecio}}</td>
                </tr>
            @endforeach
          
          
        </tbody>
      </table>
    
</body>
</html>