@extends('layouts.menu2')


@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" > 
  @endsection  

  @section('forminicio')
  <form action="/lobby/Alquiler" method="Post">
    @csrf <!-- debajo de un forms pones eso atte kiri-->

  @endsection

@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Alquilar sitio del parqueo</p>
    </div>

        <div class="botonesformu">
            
            <div class ="agregarParqueo">
                <p class="nom">Parqueo</p>
                <input class="botonAgregar" class="agregarP"type="button" name="parqueo" value="Agregar" id="mostrarEmergente" onclick="">
            </div>
            
            <div class ="agregarUsuario">
                <p class="nom">Usuario</p>
                <!--cambiar type="button" y value ="Agregar"-->
                <input class="botonAgregar" class="agregarU" type="button" value="Agregar" name="nombre" onclick="">
            </div>
        </div>
        
        <div class="fila2">
            
            <div  class="Duracion">
                <p class="nom">Duración</p>
                <input type="date" class="linea" class="fecha"  name="fechaini" placeholder="FechaInicio">
                @error('fechaini')
                <br>
                <span style="color: red" style="font-size: 25px">{{$message}}</span>
                @enderror
                <input type="date" class="linea2" class="fecha"  name="fechafin"placeholder="FechaFin">
                @error('fechafin')
                <br>
                <span style="color: red" >{{$message}}</span>
                @enderror
            </div>
            <div class="Horario">
                <p class="nom">Horario</p>
                <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                <input type="text" class="linea" name="hora" readonly >
                <br>
            </div>
        </div>
        <div class="fila3">
            <div class="seleccion">
                <p class="nom">Sitio</p>
                <select name="sitio" class="linea" class="sitio">
                    <option value="Sitio 10">Sitio 10</option>
                </select>
            </div>
            
            <div class="Precio">
                <p class="nom">Precio</p>
                <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                <input type="text" class="linea" name="costo" readonly >
            </div>
            
        </div>
        
        <div class="fila4">
            <div class="rad">
                <label class="nom2">
                    <input type="radio" class=pagar name=pago>
                    Pagar Ahora
                </label>
            </div>
            <div class="rad">
                <label class="nom2">
                    <input type="radio" class=pagar name=pago checked>
                    Pagar Después
                </label>
            </div>
        </div>
    </div>
    <div id="miEmergente" class="emergente">
        <div class="ordenar">

            <div class="azul" >
                 
            <button type="button" class="destructor" id="cerrar-ventana">x</button>
            </div>
            <div class="titu">
                <p>Seleccionar parqueo</p>
            </div>
            <div class ="buscador">
                <input  type="text" class="linea"  placeholder="Escriba una zona" >
                <button class="lupa"><img src="{{asset('/dash/assets/lupita_icono.png')}}" class="imagenlupa"> </button>
            </div>
            <table class="tabla">
                <thead>
                  <tr >
                    <th class="grillatit">Número</th>
                    <th class="grillatit">Zona</th>
                    <th class="grillatit">Horario</th>
                    <th class="grillatit">Capacidad</th>
                    <th class="grillatit">Estado</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $parqueo as $parqueos )    
                  <tr id="id=fila-{{$loop->iteration}} ">
                    <td>{{$parqueos->estacionamientoid}}</td>
                    <td>{{$parqueos->estacionamientozona}}</td>
                    <td>{{$parqueos->estacionamientohoraInicio}} - {{$parqueos->estacionamientohoraCierre}}</td>
                    <td>{{$parqueos->estacionamientositioAdministrador}}</td>
                    <td>{{$parqueos->estacionamientoestado}}</td>
                </tr>
                @endforeach
                  
                </tbody>
              </table>
           
        </div>
      </div>
      <script>
        var mostrarVentana = document.getElementById('mostrarEmergente');
        var cerrarVentana = document.getElementById('cerrar-ventana');
        var ventanaEmergente = document.getElementById('miEmergente');
        var general= document.getElementById('principal');
        var barrita= document.getElementById('azul');
        mostrarVentana.onclick = function() {
          ventanaEmergente.style.display = "block";
          barrita.style.backgroundColor = "#0A1C44";
          barrita.style.width = "300px";
          
        }

        cerrarVentana.onclick = function() {
          ventanaEmergente.style.display = "none";
          
        };
      </script>
    @endsection
    @section('botones')
    
</div>
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