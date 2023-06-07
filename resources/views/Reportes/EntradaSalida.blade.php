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
        <h3>Reporte Entradas y Salidas</h3>
    </div>
    <h4>Fechas Inicio: {{date('d/m/Y', strtotime($request->fechainicio))}}</h4>
    <h4>Fechas Fin: {{date('d/m/Y', strtotime($request->fechafin))}}</h4>
    <table style="width: 100%;">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Fecha</th>
            <th class="grillatit">Usuario</th>
            <th class="grillatit">Sitio</th>
            <th class="grillatit">Vehículo</th>
            <th class="grillatit">Ingreso</th>
            <th class="grillatit">Salida</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($entradas as $es)
            <tr style="height: 61px; border:#1042ad">
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
    
</body>
</html>