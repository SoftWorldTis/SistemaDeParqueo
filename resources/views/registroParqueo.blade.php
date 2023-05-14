
@extends('layouts.menu2')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/registroParqueo.css')}}" >

@endsection

@section('forminicio')
<form action="/lobby/RegistroParqueos" method="post" enctype="multipart/form-data">
    @csrf

@endsection

@section('contenido')
 <div class="herramientas">

<div class="ParAr">
    <p> Registro de Parqueos</p>
    @if ($message = Session::get('Registrado'))
    <div class="valido">
        <span>{{$message}}</span>
    </div>
    @endif
    @if ($message = Session::get('Mal'))
    <div class="error">
        <span>{{$message}}</span>
    </div>
    @endif
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
       <p>Sitios</p>
       <input type="number" class="linea"  onkeyup="telephone(this)" name="estacionamientositios" value="{{old('estacionamientositios')}}"  placeholder="Ingrese la cantidad de sitios">
       @error('estacionamientositios')
         <b class="error">{{$message}}<b>
       @enderror
    </div>

    <div  class="SubirQR " name="estacionamientoqr">
        <p class="sq">SubirQR</p>
     
            <!--<input  class="foto " id="foto" name="foto" type="file" accept=".jpg, .png, .jpeg" >
            <label for="foto" class="butQR button"><p> Agregar</p></label>-->
    
            <label class="form-label butQR button" id="butqr" for="inputImage">Select Image:</label>
            <input type="file" name="estacionamientoimagen" id="inputImage"class="form-control
            foto" onchange="cambio(event);">
            <br>
           
            <label for="inputImage" id="labelqr" class="labelqr">
                <img src=" " class="imagenqr" id="Modific_image" alt="">
                <img src="{{asset('/dash/assets/Lapiz.png')}}" 
                 alt="" class="editar" id="editar" >
            </label>
            @error('estacionamientoimagen')
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
        <p>Teléfono</p>
        <input type="number" class="linea" name="estacionamientotelefono" onkeyup="telephone(this)" value="{{old('estacionamientotelefono')}}" placeholder="Ingrese el telefono del lugar">
        @error('estacionamientotelefono')
            <b class="error">{{$message}}<b>
        @enderror
 
    </div>

    <div  class="PrecioDia Pi">
        <p>Precio por dia</p>
        <input type="number" class="linea" onkeyup="telephone(this)" name="estacionamientoprecio" value="{{old('estacionamientoprecio')}}"  placeholder="Precio por dia que se cobrará">
        @error('estacionamientoprecio')
        <b class="error">{{$message}}<b>
       @enderror
    </div>
</div>
</div>

</div>
@endsection


@section('botones')
   <div class="AbBotones">
    <a id="link" href="{{('/lobby/RegistroOpciones')}}"> 
    <button type="button" class="cancelar button">
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





    