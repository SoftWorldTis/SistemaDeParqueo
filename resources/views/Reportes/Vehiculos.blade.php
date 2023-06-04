<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
             font-family: 'Inter', sans-serif;
             font-style: normal;
             min-height: 100vh;
             position:relative;
             padding-bottom: 3em;
         }
         .titulo{
             text-align: center;
             font-size: 2rem;
             color: #1042ad;
         }
         table{
            text-align:center
        }
        thead{
            border: 1px solid black;
        }

     </style>
</head>
<body>
    <div class="titulo" >
        <h3>Lista de Vehiculos</h3>
    </div>
    <table style="width: 100%;">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Usuario</th>
            <th class="grillatit">CI</th>
            <th class="grillatit">Vehículo 1</th>
            <th class="grillatit">Vehículo 2</th>
            <th class="grillatit">Vehículo 3</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($usuarios as $usuario)    
                <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->ci}}</td>
                
                    @foreach($usuario->vehiculo as $vehicle)
                    <td>{{ $vehicle->vehiculoplaca }}</td>
                    @endforeach
    
                </tr>  
              
              @endforeach
          
          
        </tbody>
      </table>
    
</body>
</html>