@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')

<form action="" id="formulario">
    <h2>Editar Usuario</h2>
    <div class="row">
        <div class="col">
            <h5 for="">Nombre(s) y Apellidos</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Correo electronico</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Contraseña</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5>Roles</h5>
            <div class="col">
                <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
            </div>
            <div class="col">
                <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
            </div>
        </div>
        <div class="col">
            <h5 for="">CI</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Fecha de nacimiento</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Confirmar Contraseña</h5><br>
            <input type="text" name="" id="" class="inputB"><br><br><br>
            <div class="col">
                <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
            </div>
            <div class="col">
                <input type="radio" name="" id=""><label for="">Funcionalidad X</label>
            </div>
        </div>
    </div>
    <div class="row botones">
        <div class="col"><button class="btn" id="cancelar">Cancelar</button></div>
        <div class="col"><button class="btn" id="guardar">Guardar</button></div>
        
    </div>
</form>

@endsection