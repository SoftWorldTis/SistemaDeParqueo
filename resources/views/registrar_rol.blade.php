@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')

<form action="" id="formulario">
    <h2>Registrar Rol</h2>
    <h5 for="">Nombre Rol</h5><br>
    <input type="text" name="" id="" class="input"><br>
    <h5 for="">funcionalidades</h5>
    <div class="row">
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
        <div class="col">
            <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
        </div>
    </div>
    <div class="row botones">
        <div class="col"><button class="btn" id="cancelar">Cancelar</button></div>
        <div class="col"><button class="btn" id="guardar">Guardar</button></div>
        
    </div>
</form>

@endsection