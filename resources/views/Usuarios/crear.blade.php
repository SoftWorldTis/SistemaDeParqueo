@extends('layouts.menu2')

@section('css')
<link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
<link rel="stylesheet" href="{{asset('/dash/css/registroCliente.css')}}" >  
@endsection


@section('forminicio')
    <form action="/crear-usuario" method="post">
        @csrf

@endsection

@section('contenido')

    <div class="principal">
        <div class="tit">
            <p> Registrar Usuario</p>
            @if ($message = Session::get('Registrado'))
                    <div class="valido">
                        <span>{{$message}}</span>
                    </div>
            @endif
        </div>

        <div class="cabeza">
            
            <div class ="NombreAp">
                <p class="nom">Nombre y Apellidos</p>
                <input type="text" class="linea" name="name" value="{{old('name')}}" placeholder="Ingrese su nombre">
                @error('name')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
        
            <div class ="Ci">
                <p class="nom">CI</p>
                <input type="text" class="linea" name="ci" value="{{old('ci')}}" placeholder="Ingrese su CI ">
                @error('ci')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
        </div>
    
        <div class="fila2">
                
            <div class="Correo">
                <p class="nom">Correo Electronico</p>
                <input type="text" class="linea" name="email" value="{{old('email')}}" placeholder="Ingrese su correo"  >
                @error('email')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div  class="nacimiento">
                <p class="nom">Fecha de Nacimiento</p>
                <input type="date" class="linea" class="fecha"  name="fechanacimiento" value="{{old('fechanacimiento')}}" >
                @error('fechanacimiento')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
    
        <div class="fila3">
            <div class="Correo">
                <label for="password" class="contra">
                    <span>Contraseña:</span>
                </label>
                <input type="password" id="password" name="password" class="linea" value="{{old('password')}}">
                @error('password')
                <b class="error">{{$message}}</b>
                @enderror
            </div>
            
            <div class="carro1">
                <label for="password" class="contra">
                    <span>Confirmar Contraseña:</span>
                </label>
                <input type="password" id="password" name="password_confirmation" class="linea" {{old('password_confirmation')}}>
                @error('password_confirmation')
                <b class="error">{{$message}}</b>
                @enderror
                
            </div>
        </div>
    
    
        <div class="fila4">
            <div class="carro1">
                <p class="nom" >Roles</p>
                @foreach ($roles as $rol)
                <div class="checkcentreado">
                    <input type="checkbox" class="check" name="roles[]" value="{{$rol->id}}" {{ in_array($rol->id, (array) old('roles', [])) ? 'checked' : '' }}>
                    <label for="creaRol">{{$rol->name}}</label>
              </div> 
                @endforeach
                @error('roles')
                <b class="error">{{$message}}</b>
                @enderror
            </div>
            <div class="carro1">
                
            </div>
        </div>

    @endsection

    @section('botones')

    </div>
    <div class="AbBotones">
        <a id="link" href="{{('/lobby/RegistroUsuarios')}}"> 
        <button  type="button" class="cancelar button">
        <p>Cancelar</p>
        </button>
        
        </a>

        
        <button type="submit" class="guardar button">
        
        <p>Guardar</p>
            
        </button>   
    </div>
   </form>
   @endsection
