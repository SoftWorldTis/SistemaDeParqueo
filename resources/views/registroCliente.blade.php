<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroCliente.css')}}" >    
</head>
@extends('layouts.menu2')
@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Registro de Cliente</p>
    </div>
    <form action="/lobby/registroCliente" method="Post">
     @csrf <!-- debajo de un forms pones eso atte kiri-->
        <div class="cabeza">
            
            <div class ="NombreAp">
                <p class="nom">Nombre y Apellidos</p>
                <input type="text" class="linea" name="nombreyapellido"  >
            </div>
            
            <div class ="Ci">
                <p class="nom">CI</p>
                <input type="text" class="linea" name="ci"  >
            </div>
        </div>
        
        <div class="fila2">
            
            <div  class="nacimiento">
                <p class="nom">Fecha de Nacimiento</p>
                <input type="date" class="linea" class="fecha"  name="fechaNacimiento" >
                @error('fechaNacimiento')
                <br>
                <span style="color: red" style="font-size: 25px">{{$message}}</span>
                @enderror
            </div>
            <div class="sis">
                <p class="nom">Codigo Sis</p>
                <input type="text" class="linea" name="sis">
                <br>
            </div>
        </div>
        <div class="fila3">
            <div class="Correo">
                <p class="nom">Correo Electronico</p>
                <input type="text" class="linea" name="CorreoElectronico"  >
            </div>
            
            <div class="carro1">
                <p class="nom">Vehiculo 1</p>
                <input type="button" value ="Agregar"class="botonAgregar" name="carro1"  >
            </div>
            
        </div>
        
        <div class="fila4">
            <div class="carro1">
                <p class="nom">Vehiculo 2</p>
                <input type="button" value="Agregar" class="botonAgregar" name="carro1" id="mostrar-ventana-emergente">
            </div>
            <div class="carro1">
                <p class="nom">Vehiculo 3</p>
                <input type="button" value="Agregar" class="botonAgregar" name="carro1"  >
            </div>
        </div>
    </div>
    <div id="mi-ventana-emergente" class="emergente">
        <div class="ordenar">

            <div class="azul" >
            </div>
            <span>Agregar Vehículo</span>
            <div class="conte">
                
                
            </div>
            <button id="cerrar-ventana">Cerrar ventana emergente</button>
        </div>
      </div>
      <script>
        var mostrarVentana = document.getElementById('mostrar-ventana-emergente');
        var cerrarVentana = document.getElementById('cerrar-ventana');
        var ventanaEmergente = document.getElementById('mi-ventana-emergente');
        var barrita= document.getElementById('azul');
        mostrarVentana.onclick = function() {
          ventanaEmergente.style.display = "block";
          barrita.style.backgroundColor = "#0A1C44";
          barrita.style.width = "300px";
        }

        cerrarVentana.onclick = function() {
          ventanaEmergente.style.display = "none";
        };
      </script>
    @endsection
    @section('botones')
    
 </div>
</div>
<div class="AbBotones">
    <div class="cancelar button">
        <p>Cancelar</p>
    </div>
    <button class="guardar button"  type="submit" >
   <p>Guardar</p>
   </button>   
   </form>
   @endsection
