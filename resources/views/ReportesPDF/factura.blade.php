<!DOCTYPE html>
<html>
<head>       
    <meta charset="utf-8">
    <title>Factura</title>
    <style>
        body{
            font-family: 'Inter', sans-serif;
            font-style: normal;
            min-height: 100vh;
            position:relative;
            padding-bottom: 3em;
        }
        .titulo{
            color: #1042ad;
            font-family: 'Inter', sans-serif;
            font-style: normal;
            font-size: 25px;
        }
        .datosown{
            font-size: 18px;
            margin: 5px:
        }
        .arriba{
            display:grid;
            grid-template-columns: 1fr 1fr;
            font-family: 'Inter', sans-serif;
        }
        .cabecera{
            line-height: 18px;
            margin-left: 80px;
        }
        
        
        footer{
            width: 100%;
            text-align: center;
            position:absolute;
            bottom: 0;
            font-family: 'Inter', sans-serif;
            font-size: 10px;
        }
   
        .abajo{
            margin-top:250px;
        }
        .leybloc{
            text-align: center;
        }
        .cuadro{
            border: 1px solid black;
        }
        th{
            text-align:left
        }
    </style>
</head>
<body>
   
    <div class="arriba">

        <div>
            <h1 class="titulo">FACTURA</h1>
            <p class="datosown">Parqueo Universidad Mayor de San Simón</p>
            <p class="datosown">{{$datosFactura[0]->estacionamientozona}}</p>
            <p class="datosown">Teléfono: (+591) {{$datosFactura[0] ->estacionamientotelefono}}</p>
            <p class="datosown">Cochabamba - Bolivia</p>
        </div>
    </div>
    <br>
    <br>
    <table style="width: 105%;">
        <thead >
            <th>Cliente:</th>
            <th>N° Factura:</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$datosFactura[0]->clientenombrecompleto}}</td>
                <td>{{$datosFactura[0]->facturaid}}</td>
            </tr>
            <tr>
                <td><strong>Area alquilada:</strong></td>
                <td><strong>Fecha de emisión:</strong></td>
            </tr>
            <tr>
                <td>{{$datosFactura[0]->alquilerSitio}}</td>
                <td>{{$datosFactura[0]->facturafecha}}</td>
            </tr>
            <tr>
                <td><strong>Tiempo de alquiler:</strong></td>
            </tr>
            <tr>
                <td>{{$datosFactura[0]->alquilerFechaIni}} a {{$datosFactura[0]->alquilerFechaFin}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table style="width: 100%;">
        <thead class="cuadro">
            <th>Descripción</th>
            <th>Monto</th>
        </thead>
        <tbody>
            <td>Alquiler estacionamiento</td>
            <td>Bs {{$datosFactura[0]->facturacargo}}</td>
        </tbody>
    </table>

    <div class="abajo">
        <p class="leybloc"> Ley N° 453: El proveedor debe brindar atención sin discriminación,</p>
        <p class="leybloc">con respeto, calidez y cordialidad a los usuarios y consumidores. </p>    
  
    </div>
   
 <footer>
    <span>“ESTA  FACTURA CONTRIBUYE AL DESARROLLO DE NUESTRO PAÍS, USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LA LEY” </span>
 </footer>


   
</body>
</html>

