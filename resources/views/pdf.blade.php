<!DOCTYPE html>
<html>
<head> 
        <link rel="stylesheet" href="{{asset('/dash/css/factura.css')}}" >      
    <meta charset="utf-8">
    <title>Factura</title>
    
</head>
<body>
   
    <div class="arriba">

        <div class="cabecera">
            <h1>Factura</h1>
            <p class="datosown">Parqueo Universidad Mayor de San Simón</p>
            <p class="datosown">Facultad de Ciencia y Tecnología</p>
            <p class="datosown">Teléfono: (+591) 77112233</p>
            <p class="datosown">Cochabamba</p>
        </div>
        <div class="auto">
            <img src="{{asset('/dash/assets/autoparqueo.png')}}" alt="Logo Parqueo" class="imagen">
        </div>
    </div>
        <br>
    <br>
    <div class="medio">
        <div class="izq">
            <div class="nombre">
                <p>Nombre:</p> 
                <span>{{$nombre}} </span>
            </div>
            <div class="parqueo">
                <p>Parqueo: </p>
                <span>{{$parqueo}} </span>
            </div>
            <div class="tiempo">
                <p>Desde: {{$fechaini}} hasta {{$fechafin}}</p>
            </div>
            <div class="hora">
                <p>Horario: </p>
                <span>{{$hora}}</span>
            </div>
            <div class="area">
                <p>Área alquilada:</p>
                <span>{{$lugar}} </span>
            </div>
        </div>
        <div class="der">
            <p>N° Factura:</p>
            <span>213455</span>
            <p>Fecha de emisión:</p>
            <span>12/85/1234</span>
        </div>
    </div>
    <div class="cuadradodeafuera">
        <div class="cuadro">
            <div class="izqcuadro">
                <p>Descripción</p>
            </div>
            <div></div>
            <div class="dercuadro">
                <p>Monto</p>
            </div>
        </div>
    </div>
    <div class="cuadradodeafuera2">

        <div class="res">
            <div class="des">
                <span>Alquiler estacionamiento</span>
            </div>
            <div></div>
            <div class="cargo">
                <span>{{$cargo}}</span>
            </div>
        </div>
    </div>
    <div class="abajo">
        <div class="qrfactura">
            <img src="{{asset('/dash/assets/qrejemploFactura.png')}}" alt="Logo Parqueo" class="imagenqr">
        </div>
        <div class="ley">
            <p class="leybloc"> Ley N° 453: El proveedor debe brindar atención sin discriminación, 
            </p>
            <p class="leybloc">
                con respeto, calidez y cordialidad a los usuarios y consumidores. 
            </p>
                
            </div>
    </div>
   
 <footer>
    <span>“ESTA  FACTURA CONTRIBUYE AL DESARROLLO DE NUESTRO PAÍS, USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LA LEY” </span>
 </footer>


   
</body>
</html>

