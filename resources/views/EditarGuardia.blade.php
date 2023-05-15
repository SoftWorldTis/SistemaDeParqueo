@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroGuardia.css')}}" >
@endsection


@section('forminicio')
<form action="/lobby/RegistroGuardias/{{$guardia->guardiaci}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $guardia->guardiaci }}">

@endsection


@section('contenido')
    <div class="herramientas">
        <div class="ParAr">
            <p>Editar Guardia</p>
            @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
            @endif
        </div>

        <div class="ParIzq" >
            <div class="Nombre Pi" >
                <p>Parqueo</p>



                <select name="guardiaparqueo"  class="linea sitio" value="{{$guardia->estacionamiento_estacionamientoid}}" >
                    <option value="{{$parqueo_select->estacionamientoid}}" selected>{{$parqueo_select->estacionamientozona}}</option>
                    @foreach ($parqueos as $parqueo)
                        <option class= "linea" value="{{$parqueo->estacionamientoid}}">{{$parqueo->estacionamientozona}}</option>
                    @endforeach
                </select>
                @error('guardiaparqueo')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div >

            <div class="FechaNac Pi" >
                <p>Fecha de Nacimiento</p>
                <input type="date" id="fecha" class="linea" name="guardiafechanacimiento"  value="{{$guardia->guardiafechanacimiento}}">
                @error('guardiafechanacimiento')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div >

            <div class="CorreoE Pi" >
                <p>Correo Electronico</p>
                <input type="text" class="linea" name="guardiacorreo" value="{{$guardia->guardiacorreo}}" placeholder="Ingrese su correo" >
                @error('guardiacorreo')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
            </div>
        



        </div>
        <div class="ParDer" >
            <div class="Nombre Pi" >
                <p>Nombre(s) y Apellidos</p>
                <input type="text"id="zona"class="linea" name="guardianombre" onkeyup="lettersOnly(this)" onblur="verificar(this)" value="{{$guardia->guardianombre}} "placeholder="Ingrese su nombre">
                @error('guardianombre')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div >

            <div  class="Ci Pi">
                <p>CI</p>
                <input type="text" class="linea" name="guardiaci" onkeyup="telephone(this)" value="{{$guardia->guardiaci}}" placeholder="Ingrese su CI ">
                @error('guardiaci')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
        
            </div>
            <div  class="Horario Pi">
                <p>Horario</p>
            <div class="horas">
                <input type="time" class="linea2 liIz" id="liIz" name="guardiahoraentrada"  value="{{$guardia->guardiahoraentrada}}">     
                <p class="a"> a </p>
                <input type="time" class="linea2 liDer" id="li" name="guardiahorasalida" value="{{$guardia->guardiahorasalida}}" >
            </div>
                @error('guardiahorasalida')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
        </div>
            
        </div>
    </div>

@endsection


@section('botones')
    <div class="AbBotones">
        <a id="link" href="{{('/lobby/ListaGuardias')}}"> 
        <button  type="button" class="cancelar button">
    
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

