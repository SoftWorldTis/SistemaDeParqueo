@extends('header3')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
@endsection
@section('main')

<form action="" id="formulario">
    <h2>Editar Alquiler</h2>
    <div class="row">
        <div class="col">
            <h5 for="">Parqueo</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Duracion</h5><br>
            <input type="date" name="" id="" class="inputB"><br>
            <input type="date" name="" id="" class="inputB"><br>
            <h5 for="">Sitio</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <div class="col">
                <input type="radio" name="" id=""><label for="">Pagar ahora</label>
            </div>
        </div>
        <div class="col">
            <h5 for="">Usuario</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Horario</h5><br>
            <input type="text" name="" id="" class="inputB"><br>
            <h5 for="">Precio</h5><br>
            <input type="text" name="" id="" class="inputB"><br><br><br>
            <div class="col">
                <input type="radio" name="" id=""><label for="">Pagar despues</label>
            </div>
        </div>
    </div>
    <div class="row botones">
        <div class="col"><button class="btn" id="cancelar">Cancelar</button></div>
        <div class="col"><button class="btn" id="guardar">Guardar</button></div>
        
    </div>
</form>

@endsection