@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroCliente.css')}}" >  
@endsection
@section('forminicio')
<form action="/lobby/RegistroCliente" method="Post">
@csrf
@endsection


@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Registro de Cliente</p>
    </div>

   <!-- debajo de un forms pones eso atte kiri-->
        <div class="cabeza">
            
            <div class ="NombreAp">
                <p class="nom">Nombre y Apellidos</p>
                <input type="text" class="linea" name="clientenombrecompleto"  >
            </div>
            
            <div class ="Ci">
                <p class="nom">CI</p>
                <input type="text" class="linea" name="clienteci"  >
            </div>
        </div>
        
        <div class="fila2">
            
            <div  class="nacimiento">
                <p class="nom">Fecha de Nacimiento</p>
                <input type="date" class="linea" class="fecha"  name="clientefechanac" >
                @error('fechaNacimiento')
                <br>
                <span style="color: red" style="font-size: 25px">{{$message}}</span>
                @enderror
            </div>
            <div class="sis">
                <p class="nom">Codigo Sis</p>
                <input type="text" class="linea" name="clientesis">
                <br>
            </div>
        </div>
        <div class="fila3">
            <div class="Correo">
                <p class="nom">Correo Electronico</p>
                <input type="text" class="linea" name="clientecorreo"  >
            </div>
            
            <div class="carro1">
                <p class="nom">Vehiculo 1</p>
                <input type="button" value ="Agregar"class="botonAgregar" name="carro1"  id="mostrar-ventana-emergente" >
            </div>
            
        </div>
        
        <div class="fila4">
            <div class="carro1">
                <p class="nom">Vehiculo 2</p>
                <input type="button" value="Agregar" class="botonAgregar" name="carro1" id="mostrar-ventana-emergente2">
            </div>
            <div class="carro1">
                <p class="nom">Vehiculo 3</p>
                <input type="button" value="Agregar" class="botonAgregar" name="carro1"  id="mostrar-ventana-emergente3" >
            </div>
        </div>

    <div id="mi-ventana-emergente" class="emergente">
        <div class="modal-fondo">
            <div class="modal-contenido">
        <div class="azul">

            <button  type="button" id="cerrar-ventana" >X</button>
        </div>
        <h2>Agregar Vehículo</h2>
        <div class="conte">

            <div class="Modelo inputmodal">
                <p class="nom2" data-lastchar="*" >Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo"  >
            </div>
            <div class="Placa inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3" name="vehiculoplaca">
            </div>
            <div class="descripcion inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion"  >
            </div>
            <button id="cerrar-ventana">Cerrar ventana emergente</button>
        </div>
      
            <button type="button" id="guardar-modal" class="guardar button guardar-modal">
        
                <p>Guardar</p>
            
            </button>   
       
         </div>      
    </div>
    </div>


    <div id="mi-ventana-emergente2" class="emergente2">
        <div class="modal-fondo2">
            <div class="modal-contenido2">
                <div class="azul">

                    <button type="button" id="cerrar-ventana2" >X</button>
                </div>
        <h2>Agregar Vehículo</h2>
        <div class="conte2">

            <div class="Modelo2 inputmodal">
                <p class="nom2" data-lastchar="*">Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo2"  >
            </div>
            <div class="Placa2 inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3" name="vehiculoplaca2">
            </div>
            <div class="descripcion2 inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion2"  >
            </div>
        </div>
              <button type="button"  id="guardar-modal2" class="guardar button guardar-modal">
        
                    <p>Guardar</p>
        
              </button>   
 
         </div>      
    </div>
    </div>


    <div id="mi-ventana-emergente3" class="emergente3">
        <div class="modal-fondo3">
            <div class="modal-contenido3">
                <div class="azul">

                    <button type="button" id="cerrar-ventana3" >X</button>
                </div>
        <h2>Agregar Vehículo</h2>
        <div class="conte3">

            <div class="Modelo3 inputmodal">
                <p class="nom2" data-lastchar="*">Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo3"  >
            </div>
            <div class="Placa3 inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3" name="vehiculoplaca3">
            </div>
            <div class="descripcion3 inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion3"  >
            </div>
        </div>
                 <button type="button" id="guardar-modal3" class="guardar button guardar-modal">
        
                      <p>Guardar</p>
        
                 </button>   
 
         </div>      
    </div>
    </div>




      <script>
        var mostrarVentana = document.getElementById('mostrar-ventana-emergente');
        var cerrarVentana = document.getElementById('cerrar-ventana');
        var ventanaEmergente = document.getElementById('mi-ventana-emergente');
        var guardar = document.getElementById('guardar-modal');

        var mostrarVentana2 = document.getElementById('mostrar-ventana-emergente2');
        var cerrarVentana2 = document.getElementById('cerrar-ventana2');
        var ventanaEmergente2 = document.getElementById('mi-ventana-emergente2');
        var guardar2 = document.getElementById('guardar-modal2');

        var mostrarVentana3 = document.getElementById('mostrar-ventana-emergente3');
        var cerrarVentana3 = document.getElementById('cerrar-ventana3');
        var ventanaEmergente3 = document.getElementById('mi-ventana-emergente3');
        var guardar3 = document.getElementById('guardar-modal3');


        mostrarVentana.onclick = function() {
      
          ventanaEmergente.style.display = "block";

        };
        
        cerrarVentana.onclick = function() {

          ventanaEmergente.style.display = "none";
        };

        mostrarVentana2.onclick = function() {
      
      ventanaEmergente2.style.display = "block";

    };
    
    cerrarVentana2.onclick = function() {

      ventanaEmergente2.style.display = "none";
    };

    mostrarVentana3.onclick = function() {
      
      ventanaEmergente3.style.display = "block";

    };
    
    cerrarVentana3.onclick = function() {

      ventanaEmergente3.style.display = "none";
    };


    guardar.onclick = function() {

ventanaEmergente.style.display = "none";
};
guardar2.onclick = function() {

ventanaEmergente2.style.display = "none";
};
guardar3.onclick = function() {

ventanaEmergente3.style.display = "none";
};
      </script>
    @endsection
    @section('botones')
    
</div>
<div class="AbBotones">
    <a id="link" href="{{('/lobby/RegistroOpciones')}}"> 
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
