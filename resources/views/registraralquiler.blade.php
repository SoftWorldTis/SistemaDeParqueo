<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" >    
</head>
@extends('layouts.menu2')

<form action="lobby/Alquiler" method="POST">
    @csrf
    @section('contenido')
        <div class="principal">

            <div class="tit">
                <p> Alquilar sitio del parqueo</p>
            </div>
            
            <div class="botonesformu">
                
                <div class ="agregarParqueo">
                    <p class="nom">Parqueo</p>
                    <input class="botonAgregar" class="agregarP"type="button" value="Agregar" onclick="">
                </div>
                
                <div class ="agregarUsuario">
                    <p class="nom">Usuario</p>
                    <input class="botonAgregar" class="agregarU"type="button" value="Agregar" onclick="">
                </div>
            </div>
            
            <div class="fila2">
                
                <div  class="Duracion">
                    <p class="nom">Duración</p>
                    <div>
                        <input type="date" name="FechaInicio" class="linea fecha @error('FechaInicio') is-invalid @enderror" value="{{old('FechaInicio')}}">
                        @error('FechaInicio')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <input type="date" name="FechaFin" class=" linea2 fecha @error('FechaFin') is-invalid @enderror" value="{{old('FechaFin')}}">
                        @error('FechaFin')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    
                </div>
                <div class="Horario">
                    <p class="nom">Horario</p>
                    <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                    <input type="text" class="linea" readonly="readonly" disabled>
                </div>
            </div>

            <div class="fila3">
                <div class="seleccion">
                <p class="nom">Sitio</p>
                    
                    <input type="number" name="Sitio" class="linea sitio" min="1" max="50" step="1">
            </div>
            
            <div class="Precio">
                <p class="nom">Precio</p>
                <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                <input type="text" class="linea" readonly="readonly" value="95"> 
            </div>

            </div>

            <div class="fila4">
                <div class="rad">
                    <label class="nom2">
                        <input type="radio" class=pagar name="Pago" value="QR">
                        Pagar Ahora
                    </label>
                </div>
                <div class="rad">
                    <label class="nom2">
                        <input type="radio" class=pagar name="Pago" value="Efectivo">
                        Pagar Después
                    </label>
                </div>
            </div>
        </div>
        
    @endsection

    @section('botones')

    </div>
    </div>

    <div class="AbBotones">

    <div class="cancelar button">
    <p>Cancelar</p>
    </div>
     <!--
    <div class="guardar button">
    <p>Guardar</p>
    </div>   -->
    <button type="submit" class="guardar button">
       <p>Guardar</p> 
    </button>

</form>

    @endsection
