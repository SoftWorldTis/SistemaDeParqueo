<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" >    
</head>
@extends('layouts.menu2')
@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Alquilar sitio del parqueo</p>
    </div>
    <form action="/lobby/Alquiler" method="Post">
     @csrf <!-- debajo de un forms pones eso atte kiri-->
        <div class="botonesformu">
            
            <div class ="agregarParqueo">
                <p class="nom">Parqueo</p>
                <input class="botonAgregar" class="agregarP"type="button" name="parqueo" value="Agregar" onclick="">
            </div>
            
            <div class ="agregarUsuario">
                <p class="nom">Usuario</p>
                <!--cambiar type="button" y value ="Agregar"-->
                <input class="botonAgregar" class="agregarU" type="button" value="Agregar" name="nombre" onclick="">
            </div>
        </div>
        
        <div class="fila2">
            
            <div  class="Duracion">
                <p class="nom">Duración</p>
                <input type="date" class="linea" class="fecha"  name="fechaini" placeholder="FechaInicio">
                @error('fechaini')
                <br>
                <span style="color: red" style="font-size: 25px">{{$message}}</span>
                @enderror
                <input type="date" class="linea2" class="fecha"  name="fechafin"placeholder="FechaFin">
                @error('fechafin')
                <br>
                <span style="color: red" >{{$message}}</span>
                @enderror
            </div>
            <div class="Horario">
                <p class="nom">Horario</p>
                <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                <input type="text" class="linea" name="hora" readonly >
                <br>
            </div>
        </div>
        <div class="fila3">
            <div class="seleccion">
                <p class="nom">Sitio</p>
                <select name="sitio" class="linea" class="sitio">
                    <option value="Sitio 10">Sitio 10</option>
                </select>
            </div>
            
            <div class="Precio">
                <p class="nom">Precio</p>
                <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                <input type="text" class="linea" name="costo" readonly >
            </div>
            
        </div>
        
        <div class="fila4">
            <div class="rad">
                <label class="nom2">
                    <input type="radio" class=pagar name=pago>
                    Pagar Ahora
                </label>
            </div>
            <div class="rad">
                <label class="nom2">
                    <input type="radio" class=pagar name=pago checked>
                    Pagar Después
                </label>
            </div>
        </div>
    </div>
    
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