
@extends('layouts.menu2')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/registroParqueo.css')}}" >

@endsection

@section('forminicio')
<form action="/lobby/RegistroParqueos" method="post">
    @csrf

@endsection

@section('contenido')
 <div class="herramientas">

<div class="ParAr">
    <p> Registro de Parqueos</p>
</div>
<div class="ParIzq" >
   <div class="Zona Pi" >
        <p>Zona</p>
        <input type="text"id="zona"class="linea"name="estacionamientozona" onkeyup="lettersOnly(this)" onblur="verificar(this)" value="{{old('estacionamientozona')}}"placeholder="Ingrese la Zona del lugar">
        @error('estacionamientozona')
            <b class="error">{{$message}}<b>
        @enderror
    </div >

   <div  class="Horarios Pi">
        <p>Horarios</p>
      <div class="horas">
        <input type="time" class="linea2 liIz"id="liIz" name="estacionamientohoraInicio"  value="{{old('estacionamientohoraInicio')}}">       
           <p class="a"> a </p>
        <input type="time" class="linea2 liDer"id="li" name="estacionamientohoraCierre" value="{{old('estacionamientohoraCierre')}}" >
      </div>
        @error('estacionamientohoraCierre'  )
            <b class="error" >{{$message}}<b>
        @enderror
   </div>
   

   <div  class="SitiosDc Pi">
       <p>Sitios Docente</p>
       <input type="number" class="linea"  onkeyup="telephone(this)" name="estacionamientositioDocente" value="{{old('estacionamientositioDocente')}}"  placeholder="Ingrese la cantidad de sitios">
       @error('estacionamientositioDocente')
         <b class="error">{{$message}}<b>
       @enderror
    </div>

   <div  class="PrecioDia Pi">
        <p>Precio por dia</p>
        <input type="number" class="linea" onkeyup="telephone(this)" name="estacionamientoprecio" value="{{old('estacionamientoprecio')}}"  placeholder="precio por dia que se cobrara">
        @error('estacionamientoprecio')
        <b class="error">{{$message}}<b>
       @enderror
    </div>
</div>
<div class="ParDer" >
    <div class="CorreoE Pi" >
        <p>Correo Electronico</p>
        <input type="text" class="linea" name="estacionamientocorreo" value="{{old('estacionamientocorreo')}}" placeholder="Ingrese el correo del lugar" >
        @error('estacionamientocorreo')
           <b class="error">{{$message}}<b>
        @enderror
    </div>

   <div  class="Telefono Pi">
        <p>Telefono</p>
        <input type="number" class="linea" name="estacionamientotelefono" onkeyup="telephone(this)" value="{{old('estacionamientotelefono')}}" placeholder="Ingrese el telefono del lugar">
        @error('estacionamientotelefono')
            <b class="error">{{$message}}<b>
        @enderror
 
    </div>

   <div  class="SitiosAd Pi">
       <p>Sitios Administrador</p>
       <input type="number" class="linea"   onkeyup="telephone(this)" name="estacionamientositioAdministrador" value="{{old('estacionamientositioAdministrador')}}" placeholder="Ingrese la cantidad de sitios" >
       @error('estacionamientositioAdministrador')
        <b class="error">{{$message}}<b>
       @enderror
    </div>

   <div  class="SubirQR " name="estacionamientoqr">
    <p class="sq">SubirQR</p>
 
        <input  class="foto " id="foto" name="foto" type="file" accept=".jpg, .png, .jpeg" >
        <label for="foto" class="butQR button"><p> Agregar</p></label>
    
    </div>
</div>

</div>
@endsection


@section('botones')
   <div class="AbBotones">
    <a id="link" href="{{('/lobby/RegistroOpciones')}}"> 
    <button class="cancelar button">
    <p>Cancelar</p>
    </button>
    
    </a>

    
    <button type="submit" class="guardar button">
       
    <p>Guardar</p>
        
    </button>   
    </div>
    
</form>
<script src="{{asset('/dash/scripts/parqueo.js')}}"> </script> 
@endsection




    