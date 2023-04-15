<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" >    
</head>
@extends('layouts.menu2')
@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Alquilar sitio del parqueo</p>
    </div>
    
    <div class="botonesformu">
        
        <div class ="agregarParqueo">
            <p class="nom">Parqueo</p>
            <input class="botonAgregar" class="agregarP"type="button" value="Agregar" onclick="">
        </div>
        
        <div class ="agregarUsuario">
            <p class="nom">Usuario</p>
            <input class="botonAgregar" class="agregarU"type="button" value="Agregar" onclick="">
        </div>
    </div>
    
    <div class="fila2">
        
        <div  class="Duracion">
            <p class="nom">Duración</p>
            <input type="date" class="linea" class="fecha"  placeholder="FechaInicio">
            <input type="date" class="linea2" class="fecha"  placeholder="FechaFin">
        </div>
        <div class="Horario">
            <p class="nom">Horario</p>
            <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
            <input type="text" class="linea" readonly="readonly" >
        </div>
    </div>
    <div class="fila3">
        <div class="seleccion">
          <p class="nom">Sitio</p>
            <select name="Sitio" class="linea" class="sitio">
            </select>
      </div>
      
      <div class="Precio">
        <p class="nom">Precio</p>
         <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
        <input type="text" class="linea" readonly="readonly" >
      </div>

    </div>

    <div class="fila4">
        <div class="rad">
            <label class="nom2">
                <input type="radio" class=pagar name=pago value="QR">
                Pagar Ahora
            </label>
        </div>
        <div class="rad">
            <label class="nom2">
                <input type="radio" class=pagar name=pago value="Efectivo">
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


<div class="guardar button">
   
<p>Guardar</p>
    
</div>   
@endsection