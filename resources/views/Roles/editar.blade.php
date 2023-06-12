@extends('layouts.menu2')

@section('css')

    <link rel="stylesheet" href="{{asset('/dash/css/registroRol.css')}}" >  
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
@endsection
@section('forminicio')
<form action="/editar-rol/{{$rol->id}}" method="post">
@csrf

@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Editar Rol </p>
        @if ($message = Session::get('Registrado'))
            <div class="valido">
                <span>{{$message}}</span>
            </div>
        @endif
    </div>
    <div class="ParMedio">
        <p> Nombre Rol </p>
        <input type="text" class="linea" name="nombrerol" placeholder="Ingrese el rol" value="{{$rol->name}}">
        @error('nombrerol')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
    </div>

    <div class="ParAba">
        <p class="funti"> Funcionalidades </p>
        @foreach ($permisos as $permiso)
            <div class="checkcentreado">

                <input type="checkbox" class="check" name="permisos[]" value="{{$permiso->id}}"  
                @if(in_array($permiso->name, $rolPermisos)) checked @endif 
                {{ in_array($permiso->id, (array) old('permisos', [])) ? 'checked' : '' }}>
                <label for="creaRol">{{$permiso->name}}</label>
                
          </div> 
        @endforeach
        @error('permisos')
                <div class="error">
                    {{$message}}
                </div>
            @enderror
    </div>

</div>

@endsection

@section('botones')
<div class="AbBotones">
    <a id="link" href="{{('/lobby')}}"> 
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