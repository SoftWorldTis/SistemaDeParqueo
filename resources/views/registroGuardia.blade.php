@extends('layouts.menu2')



@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/registroGuardia.css')}}" >

@endsection
@section('forminicio')
    <form action="/lobby/RegistroGuardias" method="post">
        @csrf

@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Registro de Guardias</p>
    </div>

    <div class="ParIzq" >

        <div class="Nombre Pi" >
            <p>Nombre(s) y Apellidos</p>
            <input type="text"id="zona"class="linea"name="guardianombre" onkeyup="lettersOnly(this)" onblur="verificar(this)" value="{{old('guardianombre')}}"placeholder="Ingrese su nombre">
            @error('guardianombre')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
        </div >

        <div class="FechaNac Pi" >
            <p>Fecha de Nacimiento</p>
            <input type="date" id="fecha" class="linea" name="guardiafechanacimiento"  value="{{old('guardiafechanacimiento')}}">
            @error('guardiafechanacimiento')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
        </div >

        <div class="CorreoE Pi" >
            <p>Correo Electronico</p>
            <input type="text" class="linea" name="guardiacorreo" value="{{old('guardiacorreo')}}" placeholder="Ingrese su correo" >
            @error('guardiacorreo')
            <div class="error">
                {{$message}}
            </div>
        @enderror
        </div>
    



    </div>
    <div class="ParDer" >

        <div  class="Ci Pi">
            <p>CI</p>
            <input type="text" class="linea" name="guardiaci" onkeyup="telephone(this)" value="{{old('guardiaci')}}" placeholder="Ingrese su CI ">
            @error('guardiaci')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
     
        </div>
        <div  class="Horario Pi">
            <p>Horario</p>
          <div class="horas">
            <input type="time" class="linea2 liIz" id="liIz" name="guardiahoraentrada"  value="{{old('guardiahoraentrada')}}">     
               <p class="a"> a </p>
            <input type="time" class="linea2 liDer" id="li" name="guardiahorasalida" value="{{old('guardiahorasalida')}}" >
            @error('guardiahorasalida')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
          </div>
           
       </div>
        
    </div>
</div>
@endsection

@section('botones')
<div class="AbBotones">
    <a id="link" href="{{('/lobby/RegistroUsuarios')}}"> 
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