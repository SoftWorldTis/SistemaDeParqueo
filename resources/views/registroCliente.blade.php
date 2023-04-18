@extends('layouts.menu2')



@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/registroCliente.css')}}" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

@endsection


@section('contenido')

<div id="formulario">
    <div class="ParAr">
    <h3>Registro Cliente</h3>
    </div>


    <div class="row row1">
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

    <div class="row row2 datoPar">
        <div class="col">
            <label>Fecha de nacimiento</label><br>
            <input type="date" class="inputText">
        </div>
        <div class="col">
            <div class="col">
                <label>Codigo SIS</label><br>
                <input type="text" class="inputText">
            </div>
        </div>
    </div>
    
    <div class="row row3 datoPar">
        <div class="col">
            <label>Correo electronico</label><br>
            <input type="text" class="inputText">
        </div>
        <div class="col">
            <div class="col">
                <label>Vehiculo 1</label><br>
                <span class="agregar" id="btnVehiculo1">Agregar</span>
            </div>
        </div>
    </div>
    <div class="row  row4 datoPar">
        <div class="col">
            <label>Vehiculo 2</label><br>
            <span class="agregar" id="btnVehiculo2">Agregar</span>
        </div>
        <div class="col">
            <div class="col">
                <label>Vehiculo 3</label><br>
                <span class="agregar" id="btnVehiculo3">Agregar</span>
            </div>
        </div>
    </div>
</div>


<div class="vehiculo" id="vehiculo1">
    <div class="barraT"><span class="closed" id="close1">x</span></div>
    <h1>Agregar Vehiculo</h1>
    <label>Modelo</label><br>
    <input type="text" class="inputText"><br>
    <label>Placa</label><br>
    <input type="text" class="inputText"><br>
    <label>Descripcion</label><br>
    <input type="text" class="inputText">
    <button class="guardarV">Guardar</button>
</div>
<div class="vehiculo" id="vehiculo2">
    <div class="barraT"><span class="closed" id="close2">x</span></div>
    <h1>Agregar Vehiculo</h1>
    <label>Modelo</label><br>
    <input type="text" class="inputText"><br>
    <label>Placa</label><br>
    <input type="text" class="inputText"><br>
    <label>Descripcion</label><br>
    <input type="text" class="inputText">
    <button class="guardarV">Guardar</button>
</div>
<div class="vehiculo" id="vehiculo3">
    <div class="barraT"><span class="closed" id="close3">x</span></div>
    <h1>Agregar Vehiculo</h1>
    <label>Modelo</label><br>
    <input type="text" class="inputText"><br>
    <label>Placa</label><br>
    <input type="text" class="inputText"><br>
    <label>Descripcion</label><br>
    <input type="text" class="inputText">
    <button class="guardarV">Guardar</button>
</div>



<script>
    var btnVehiculo1=document.getElementById("btnVehiculo1")
    var Vehiculo1=document.getElementById("vehiculo1")
    var close1=document.getElementById("close1")
    btnVehiculo1.onclick=function(){Vehiculo1.style.display="block"}
    close1.onclick=function(){Vehiculo1.style.display="none"}

    var btnVehiculo2=document.getElementById("btnVehiculo2")
    var Vehiculo2=document.getElementById("vehiculo2")
    var close2=document.getElementById("close2")
    btnVehiculo2.onclick=function(){Vehiculo2.style.display="block"}
    close2.onclick=function(){Vehiculo2.style.display="none"}

    var btnVehiculo3=document.getElementById("btnVehiculo3")
    var Vehiculo3=document.getElementById("vehiculo3")
    var close3=document.getElementById("close3")
    btnVehiculo3.onclick=function(){Vehiculo3.style.display="block"}
    close3.onclick=function(){Vehiculo3.style.display="none"}
</script>





@endsection

@section('botones')

<div class="AbBotones">

    <button class="cancelar button">
  
    <p>Cancelar</p>
    </button>
    
    
    <button type="submit" class="guardar button">
       
    <p>Guardar</p>
        
    </button>   
    </div>
    
</form>
<script src="{{asset('/dash/scripts/parqueo.js')}}"> </script> 

@endsection



