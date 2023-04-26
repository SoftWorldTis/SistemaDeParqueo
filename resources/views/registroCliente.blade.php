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
                <p class="nom" id="veh1">Vehiculo 1</p>
                <input type="button" value ="Agregar"class="botonAgregar" name="carro1"  id="mostrar-ventana-emergente" >
                <div class=" oculto" id="oculto">
                 <input type="text" class="linea"  id="vinput">
                 <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar" >
                </div>
            </div>
            
        </div>
        
        <div class="fila4">
            <div class="carro1">
                <p class="nom" id="veh2">Vehiculo 2</p>
               
                <input type="button" value="Agregar" class="botonAgregar" name="carro1" id="mostrar-ventana-emergente2">
                <div class=" oculto" id="oculto2">
                    <input type="text" class="linea"  id="vinput2">
                    <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar2" >
                </div>
            
            </div>
            <div class="carro1">
                <p class="nom" id="veh3">Vehiculo 3</p>
                <input type="button" value="Agregar" class="botonAgregar" name="carro1"  id="mostrar-ventana-emergente3" >
                <div class=" oculto" id="oculto3">
                    <input type="text" class="linea"  id="vinput3">
                    <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar3" >
                </div>
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
                <input type="text" class="linea3"id="vplaca" name="vehiculoplaca">
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
                <input type="text" class="linea3"id="vplaca2" name="vehiculoplaca2">
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
                <input type="text" class=" vplaca linea3" id="vplaca3"name="vehiculoplaca3">
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
        var editar = document.getElementById('editar');
        var cerrarVentana = document.getElementById('cerrar-ventana');
        var ventanaEmergente = document.getElementById('mi-ventana-emergente');
        var guardar = document.getElementById('guardar-modal');
       


        var mostrarVentana2 = document.getElementById('mostrar-ventana-emergente2');
        var editar2 = document.getElementById('editar2');
        var cerrarVentana2 = document.getElementById('cerrar-ventana2');
        var ventanaEmergente2 = document.getElementById('mi-ventana-emergente2');
        var guardar2 = document.getElementById('guardar-modal2');


        var mostrarVentana3 = document.getElementById('mostrar-ventana-emergente3');
        var editar3 = document.getElementById('editar3');
        var cerrarVentana3 = document.getElementById('cerrar-ventana3');
        var ventanaEmergente3 = document.getElementById('mi-ventana-emergente3');
        var guardar3 = document.getElementById('guardar-modal3');



        mostrarVentana.onclick = function() {
      
          ventanaEmergente.style.display = "block";

        };
        editar.onclick = function() {
      
      ventanaEmergente.style.display = "block";

    };
        
        cerrarVentana.onclick = function() {

          ventanaEmergente.style.display = "none";
        };

        mostrarVentana2.onclick = function() {
      
      ventanaEmergente2.style.display = "block";

    };
    editar2.onclick = function() {
      
      ventanaEmergente2.style.display = "block";

    };
    
    cerrarVentana2.onclick = function() {

      ventanaEmergente2.style.display = "none";
    };

    mostrarVentana3.onclick = function() {
      
      ventanaEmergente3.style.display = "block";

    };
    editar3.onclick = function() {
      
      ventanaEmergente3.style.display = "block";

    };
    
    cerrarVentana3.onclick = function() {

      ventanaEmergente3.style.display = "none";
    };


        guardar.onclick = function() {
            document.getElementById('veh1').style.marginBottom="18px";
            document.getElementById('vinput').value=document.getElementById('vplaca').value;
            document.getElementById('oculto').style.display="block";
            ventanaEmergente.style.display = "none";
            mostrarVentana.style.display="none";


 
        };
        guardar2.onclick = function() {
            document.getElementById('veh2').style.marginBottom="18px";
            document.getElementById('vinput2').value=document.getElementById('vplaca2').value;
            document.getElementById('oculto2').style.display="block";
            ventanaEmergente2.style.display = "none";
            mostrarVentana2.style.display="none";
        };

        guardar3.onclick = function() {
            document.getElementById('veh3').style.marginBottom="18px";
            document.getElementById('vinput3').value=document.getElementById('vplaca3').value;
            document.getElementById('oculto3').style.display="block";
            ventanaEmergente3.style.display = "none";
            mostrarVentana3.style.display="none";
        };




      </script>
    @endsection
    @section('botones')
    
</div>
<div class="AbBotones">
    <a id="link" href="{{('/lobby/RegistroUsuarios')}}"> 
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
