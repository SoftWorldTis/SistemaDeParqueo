@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')

<form action="" id="formulario">
    <h2>Crear Funcionalidad</h2>
    
    <input type="text" name="" id="" class="input" placeholder="Nombre funcionalidad"><br>
    <input type="text" name="" id="" class="input" placeholder="Ruta"><br>
    
    <div class="row botones">
        <div class="col"><button class="btn" id="cancelar">Cancelar</button></div>
        <div class="col"><button class="btn" id="guardar">Guardar</button></div>
        
    </div>
</form>

@endsection