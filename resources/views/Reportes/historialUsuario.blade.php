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
        <h3>Historial Roles de Usuarios</h3>
    </div>
    <table style="width: 100%;">
        <thead>
          <tr >
            <th class="grillatit">Usuario</th>
            <th class="grillatit">Rol</th>
            <th class="grillatit">Tipo de cambio</th>
            <th class="grillatit">Fecha y hora</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($historial as $history)
                <tr id="id=fila-{{$loop->iteration}}">
                    <td>{{$history->user->name}}</td>
                    <td>{{$history->role->name}}</td>
                    <td>{{$history->change}}</td>
                    <td>{{date('d/m/Y H:i A', strtotime($history->updated)) }}</td>
                </tr>
            @endforeach
          
          
        </tbody>
      </table>
    
</body>
</html>