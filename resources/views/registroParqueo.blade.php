
@extends('layouts.menu2')



@section('contenido')
<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroParqueo.css')}}" >
    <title>Registro</title>
</head>

<form action="/lobby/RegistroParqueos" method="post">
    @csrf
    <div class="herramientas">

<div class="ParAr">
    <p> Registro de Parqueos</p>
</div>
<div class="ParIzq" >
   <div class="Zona Pi" >
        <p>Zona</p>
        <input type="text" class="linea"name="estacionamientozona" placeholder="Zona">
   </div >

   <div  class="Horarios Pi">
        <p>Horarios</p>
        <input type="text" class="linea" name="estacionamientohorario">
   </div>

   <div  class="SitiosDc Pi">
       <p>Sitios Docente</p>
       <input type="text" class="linea" name="estacionamientositioDocente">
   </div>

   <div  class="PrecioDia Pi">
        <p>Precio por dia</p>
        <input type="text" class="linea" name="estacionamientoprecio">
   </div>
</div>
<div class="ParDer" >
    <div class="CorreoE Pi" >
        <p>Correo Electronico</p>
        <input type="text" class="linea" name="estacionamientocorreo" >
   </div  >

   <div  class="Telefono Pi">
        <p>Telefono</p>
        <input type="text" class="linea" name="estacionamientotelefono">
   </div>

   <div  class="SitiosAd Pi">
       <p>Sitios administrador</p>
       <input type="text" class="linea"  name="estacionamientositioAdministrador" >
   </div>

   <div  class="SubirQR " name="estacionamientoqr">
    <p class="sq">SubirQR</p>
 
        <input  class="foto " id="foto" name="foto" type="file" accept=".jpg, .png, .jpeg" >
        <label for="foto" class="butQR button"><p> Agregar</p></label>

    
</div>
</div>
@endsection
@section('botones')


   <div class="AbBotones">

    <div class="cancelar button">
  
    <p>Cancelar</p>
    </div>
    
    
    <button type="submit" class="guardar button">
       
    <p>Guardar</p>
        
    </button>   
</div>
</form>

    

@endsection




