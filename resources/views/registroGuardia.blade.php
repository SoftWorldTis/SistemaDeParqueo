<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guardia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/dash/css/registroCliente.css')}}" >
</head>
<body>
    <div id="navbar" class="row">
        <div class="col opcion">Inicio</div>
        <div class="col opcion">Ver Parqueos</div>
        <div class="col opcion">Registrar</div>
        <div class="col opcion">Usuarios</div>
        <div class="col opcion">Reclamos</div>
        <div class="col opcion">Alquilar</div>
        <div class="col opcion">Salir</div>
    </div>
    <div id="formulario">
        <h3>Registro de Guardia</h3>
        <div class="row">
            <div class="col">
                <label>Nombre(s) y Apellidos</label><br>
                <input type="text" class="inputText">
            </div>
            <div class="col">
                <div class="col">
                    <label>CI</label><br>
                    <input type="text" class="inputText">
                </div>
            </div>
        </div>
        <div class="row datoPar">
            <div class="col">
                <label>Fecha de nacimiento</label><br>
                <input type="date" class="inputText col-4" >
            </div>
            <div class="col">
                <div class="col">
                    <label>Horario</label><br>
                    <input type="text" class="inputText col-2" value="00:00"> <span>a</span> <input type="text" class="inputText col-2" value="00:00">
                </div>
            </div>
        </div>
        <div class="row datoPar">
            <div class="col-6">
                <label>Correo electronico</label><br>
                <input type="text" class="inputText">
            </div>
        </div>
    </div>
    <div class="row">
        <button class="col-1" id="botonCancelar">Cancelar</button>
        <button class="col-1" id="botonRegistrar">Registrar</button>
    </div>
</body>
</html>