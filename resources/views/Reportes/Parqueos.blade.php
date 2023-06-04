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
        <h3>Lista de Parqueos</h3>
    </div>
    <table style="width: 100%;">
        <thead>
          <tr >
            <th class="grillatit">Número</th>
            <th class="grillatit">Parqueo</th>
            <th class="grillatit">Espacios</th>
            <th class="grillatit">Precio</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($parqueos as $parqueo)
                <tr id="id=fila-{{$loop->iteration}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$parqueo->estacionamientozona}}</td>
                    <td>{{$parqueo->estacionamientositios}}</td>
                    <td>{{$parqueo->estacionamientoprecio}}</td>
                </tr>
            @endforeach
          
          
        </tbody>
      </table>
    
</body>
</html>