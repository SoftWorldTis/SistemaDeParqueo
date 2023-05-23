@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')

<form action="" id="formulario">
    <h2>Editarar Vehiculo</h2>
    <div class="row">
        <div class="col">
            <h5 for="">Nombre(s) y Apellidos</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5>Vehiculo 2</h5><br>
            <a href="#" class="btn boton">Agregar</a>
        </div>
        <div class="col">
            <h5>Vehiculo 1</h5><br>
            <a href="#" class="btn boton">Agregar</a>
            <h5>Vehiculo 3</h5><br>
            <a href="#" class="btn boton">Agregar</a>
        </div>
    </div>
    <div class="row botones">
        <div class="col"><button class="btn" id="cancelar">Cancelar</button></div>
        <div class="col"><button class="btn" id="guardar">Guardar</button></div>
        
    </div>
</form>

@endsection