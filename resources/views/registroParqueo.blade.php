
@extends('layouts.menu')

@section('contenido')
<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registro.css')}}" >
    <title>Registro</title>
</head>
<body>
    <div class="herramientas">
<div class="ParAr">
    <p> Registro de Parqueos</p>
</div>
<div class="ParIzq" >
   <div class="Ubicacion Pi" >
        <p>Ubicacion</p>
        <div class="linea"></div>
   </div  >
   <br>
   <div  class="Horarios Pi">
        <p>Horarios</p>
        <div class="linea"></div>
   </div>
   <br>
   <div  class="SitiosDc Pi">
       <p>Sitios Docente</p>
       <div class="linea"></div>
   </div>
   <br>
   <div  class="PrecioDia Pi">
        <p>Precio por dia</p>
        <div class="linea"></div>
   </div>
</div>
<div class="ParDer" >
    <div class="Zona Pi" >
        <p>Zona</p>
        <div class="linea"></div>
   </div  >
   <br>
   <div  class="Telefono Pi">
        <p>Telefono</p>
        <div class="linea"></div>
   </div>
   <br>
   <div  class="SitiosAd Pi">
       <p>Sitios administrador</p>
       <div class="linea"></div>
   </div>
   <br>
 


</div>
    </div>
   <div class="AbBotones">

    <div class="cancelar button">
  
    <p>Cancelar</p>
    </div>
    
    
    <div class="guardar button">
       
    <p>Guardar</p>
        
    </div>   

    </div> 
    
</body>


@endsection


