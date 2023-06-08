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
        <h3>Lista de Deudas</h3>
    </div>
    <table style="width: 100%;">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Parqueo</th>
            <th class="grillatit">Usuario</th>
            <th class="grillatit">Espacio</th>
            <th class="grillatit">Fecha Inicio</th>
            <th class="grillatit">Fecha Fin</th>
            <th class="grillatit">Monto</th>
          </tr>
        </thead>
        <tbody>  
             
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
          
          
        </tbody>
      </table>
    
</body>
</html>