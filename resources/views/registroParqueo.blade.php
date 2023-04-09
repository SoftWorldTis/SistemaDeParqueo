
@extends('layouts.menu2')

@section('contenido')
<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroParqueo.css')}}" >
    <title>Registro</title>
</head>


<div class="ParAr">
    <p> Registro de Parqueos</p>
</div>
<div class="ParIzq" >
   <div class="Zona Pi" >
        <p>Zona</p>
        <input type="text" class="linea">
   </div >

   <div  class="Horarios Pi">
        <p>Horarios</p>
        <input type="text" class="linea">
   </div>

   <div  class="SitiosDc Pi">
       <p>Sitios Docente</p>
       <input type="text" class="linea">
   </div>

   <div  class="PrecioDia Pi">
        <p>Precio por dia</p>
        <input type="number" class="linea">
   </div>
</div>
<div class="ParDer" >
    <div class="CorreoE Pi" >
        <p>Correo Electronico</p>
        <input type="email" class="linea">
   </div  >

   <div  class="Telefono Pi">
        <p>Telefono</p>
        <input type="tel" class="linea">
   </div>

   <div  class="SitiosAd Pi">
       <p>Sitios administrador</p>
       <input type="text" class="linea">
   </div>

   <div  class="SubirQR ">
    <p class="sq">SubirQR</p>
 
        <input  class="foto " id="foto" name="foto" type="file" accept=".jpg, .png, .jpeg" >
        <label for="foto" class="butQR button"><p> Agregar</p></label>

    
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




