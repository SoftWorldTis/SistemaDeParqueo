@php
 use Carbon\Carbon;    
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            margin: auto;
            text-align:center
        }
        thead{
            border: 1px solid black;
        }

        tr td,
        tr th{
            padding: 8px 14px;
        }

    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="titulo">
        <h1>Lista de Guardias</h1>
    </div>
    <table class="tabla">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Guardia</th>
            <th class="grillatit">Correo</th>
            <th class="grillatit">CI</th>
            <th class="grillatit">Entrada</th>
            <th class="grillatit">Salida</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ( $guardias as $key => $guardiass)    
             
              @php
                $entrada = Carbon::parse($guardiass->guardiahoraentrada)->format('H:i');
                $salida = Carbon::parse($guardiass->guardiahorasalida)->format('H:i');
              @endphp  
              
              <tr  id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                <td>{{ $key + 1 }}</td>
                <td>{{ $guardiass->guardianombre }}</td>
                <td>{{ $guardiass->guardiacorreo }}</td>
                <td>{{ $guardiass->guardiaci }}</td>
                <td>{{ $entrada }}</td>
                <td>{{ $salida }}</td>
              </tr>
              @endforeach

        </tbody>
      </table>

</body>
</html>