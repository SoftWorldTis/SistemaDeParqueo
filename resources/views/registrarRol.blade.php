@extends('layouts.menu2')

@section('css')

    <link rel="stylesheet" href="{{asset('/dash/css/registroRol.css')}}" >  
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
@endsection
@section('forminicio')
    <form action="/lobby/RegistroRol" method="post">
        @csrf

@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Crear Rol </p>
    </div>
    <div class="ParMedio">
        <p> Nombre Rol </p>
        <input type="text" class="linea" name="rolnombre" placeholder="Ingrese el rol">
    </div>

    <div class="ParAba">
        <p class="funti"> Funcionalidades </p>

      <div class="checkcentreado">
        <input type="checkbox" class="check" name="crearRol">
        <label for="creaRol">Crear Rol</label>
      </div>

      
      <div class="checkcentreado">
        <input type="checkbox" class="check" name="editRol">
        <label for="ediRol">Editar Rol</label>
      </div>
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