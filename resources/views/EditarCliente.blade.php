@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/editarCliente.css')}}" >  
@endsection
@section('forminicio')
<form action="/lobby/EditarCliente/{{ $cliente->clienteci }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $cliente->clienteci }}">

@endsection


@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Edicion de Cliente</p>
    </div>

   <!-- debajo de un forms pones eso atte kiri-->
        <div class="cabeza">
            
            <div class ="NombreAp">
                <p class="nom">Nombre y Apellidos</p>
                <input type="text" class="linea" name="clientenombrecompleto" value="{{$cliente->clientenombrecompleto}}" >
                @error('clientenombrecompleto')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
        
            <div class ="Ci">
                <p class="nom">CI</p>
                <input type="text" class="linea" name="clienteci" value="{{ $cliente->clienteci}}" >
                @error('clienteci')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>

        </div>
        
        <div class="fila2">
            
            <div  class="nacimiento">
                <p class="nom">Fecha de Nacimiento</p>
                <input type="date" class="linea" class="fecha"  name="clientefechanac" value="{{ date('Y-m-d', strtotime($cliente->clientefechanac))}}" >
                @error('clientefechanac')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="sis">
                <p class="nom">Codigo Sis</p>
                <input type="text" class="linea" name="clientesis" value="{{$cliente->clientesis}}" >
                <br>
                @error('clientesis')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="fila3">
            <div class="Correo">
                <p class="nom">Correo Electronico</p>
                <input type="text" class="linea" name="clientecorreo" value="{{$cliente->clientecorreo}}"  >
                @error('clientecorreo')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
         
            <div class="carro1">
                <p class="nom" id="veh1">Vehículo 1</p>
                <input type="button" value ="Agregar"class="botonAgregar" name="carro1"  id="mostrar-ventana-emergente" >
         
                <div class=" oculto" id="oculto">
                 <input type="text" class="linea" name="clienteV1" id="vinput" value="{{old('vinput')}}" >
                 <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar" >
                </div>
            
                @error('clienteV1')
                    <div class="error">
                        {{$message}}
                    </div> 
                @enderror
                
                
            </div>

        </div>
        
        <div class="fila4">
            <div class="carro1">
                <p class="nom" id="veh2">Vehículo 2</p>
               
                <input type="button" value="Agregar" class="botonAgregar" name="carro1" id="mostrar-ventana-emergente2">
                <div class=" oculto" id="oculto2">
                    <input type="text" class="linea"  id="vinput2">
                    <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar2" >
                </div>
            
            </div>
            <div class="carro1">
                <p class="nom" id="veh3">Vehículo 3</p>
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
            @if(isset($resultados[0]))
            <div class="Modelo inputmodal">
                <p class="nom2" data-lastchar="*" >Modelo  </p>
        
                <input type="text" class="linea3" name="vehiculomodelo" id="vehiculomodelo1" value="{{$resultados[0]->vehiculomodelo}}" >
              
          
                <div id="messageM" class="error" hidden>
                    Introduzca solo letras. Máximo 20 caracteres.
                </div>
            </div>
            <div class="Placa inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3"id="vplaca" name="vehiculoplaca" value="{{$resultados[0]->vehiculoplaca}}">
                <div id="messageP" class="error" hidden>
                    Introduzca solo letras y/o números. Máximo 8 caracteres.
                </div>
            </div>
            <div class="descripcion inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion"  value="{{$resultados[0]->vehiculodescripcion}}" >
            </div>
            <button id="cerrar-ventana">Cerrar ventana emergente</button>
           @else
           <div class="Modelo inputmodal">
            <p class="nom2" data-lastchar="*" >Modelo  </p>
    
            <input type="text" class="linea3" name="vehiculomodelo" id="vehiculomodelo1"  >
          
      
            <div id="messageM" class="error" hidden>
                Introduzca solo letras. Máximo 20 caracteres.
            </div>
        </div>
        <div class="Placa inputmodal">
            <p class="nom2" data-lastchar="*">Placa  </p>
            <input type="text" class="linea3"id="vplaca" name="vehiculoplaca">
            <div id="messageP" class="error" hidden>
                Introduzca solo letras y/o números. Máximo 8 caracteres.
            </div>
        </div>
        <div class="descripcion inputmodal">
            <p class="nom2" >Descripción</p>
            <input type="text" class="linea3" name="vehiculodescripcion" >
        </div>
        <button id="cerrar-ventana">Cerrar ventana emergente</button>
            @endif
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
            @if(isset($resultados[1]))
            <div class="Modelo2 inputmodal">
                <p class="nom2" data-lastchar="*">Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo2"  id="vehiculomodelo2" value="{{$resultados[1]->vehiculomodelo}}">
                <div id="messageM" class="error" hidden>
                    Introduzca solo letras. Máximo 20 caracteres.
                </div>
            </div>
            <div class="Placa2 inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3"id="vplaca2" name="vehiculoplaca2" value="{{$resultados[1]->vehiculoplaca}}">
                <div id="messageP" class="error" hidden>
                    Introduzca solo letras y/o números. Máximo 8 caracteres.
                </div>
            </div>
            <div class="descripcion2 inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion2"  value="{{$resultados[1]->vehiculodescripcion}}" >
            </div>
            @else
            <div class="Modelo2 inputmodal">
                <p class="nom2" data-lastchar="*">Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo2"  id="vehiculomodelo2" >
                <div id="messageM" class="error" hidden>
                    Introduzca solo letras. Máximo 20 caracteres.
                </div>
            </div>
            <div class="Placa2 inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3"id="vplaca2" name="vehiculoplaca2">
                <div id="messageP" class="error" hidden>
                    Introduzca solo letras y/o números. Máximo 8 caracteres.
                </div>
            </div>
            <div class="descripcion2 inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion2"   >
            </div>
            @endif
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
            @if(isset($resultados[2]))
            <div class="Modelo3 inputmodal">
                <p class="nom2" data-lastchar="*">Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo3"  id="vehiculomodelo3" value="{{$resultados[2]->vehiculomodelo}}">
                <div id="messageM" class="error" hidden>
                    Introduzca solo letras. Máximo 20 caracteres.
                </div>
            </div>
            <div class="Placa3 inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class=" vplaca linea3" id="vplaca3"name="vehiculoplaca3" value="{{$resultados[2]->vehiculoplaca}}">
                <div id="messageP" class="error" hidden>
                    Introduzca solo letras y/o números. Máximo 8 caracteres.
                </div>
            </div>
            <div class="descripcion3 inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion3"   value="{{$resultados[2]->vehiculodescripcion}}">
            </div>
            @else
            <div class="Modelo3 inputmodal">
                <p class="nom2" data-lastchar="*">Modelo  </p>
                <input type="text" class="linea3" name="vehiculomodelo3"  id="vehiculomodelo3" >
                <div id="messageM" class="error" hidden>
                    Introduzca solo letras. Máximo 20 caracteres.
                </div>
            </div>
            <div class="Placa3 inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class=" vplaca linea3" id="vplaca3"name="vehiculoplaca3">
                <div id="messageP" class="error" hidden>
                    Introduzca solo letras y/o números. Máximo 8 caracteres.
                </div>
            </div>
            <div class="descripcion3 inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion3"  >
            </div>
            @endif
        </div>
                 <button type="button" id="guardar-modal3" class="guardar button guardar-modal">
        
                      <p>Guardar</p>
        
                 </button>   
 
         </div>      
    </div>
    </div>




      <script>

 /////// para que el boton guardar se convierta si esta lleno 
 window.onload= function() {
        @if(isset($resultados[0]))
            const modelo = document.getElementById('vehiculomodelo1')
            const placa = document.getElementById('vplaca')
            const validandoM = validarLetras(modelo)
            const validandoP = validarLetrasNum(placa)

            if(validandoM && validandoP){
                
                document.getElementById('veh1').style.marginBottom="18px";
                document.getElementById('vinput').value=document.getElementById('vplaca').value;
                document.getElementById('oculto').style.display="block";
                ventanaEmergente.style.display = "none";
                mostrarVentana.style.display="none";
            }else{
                mostrarVentana.style.display="block";
            }
       @endif
       @if(isset($resultados[1]))
        const modelo2 = document.getElementById('vehiculomodelo2')
            const placa2 = document.getElementById('vplaca2')
            const validandoM2 = validarLetras(modelo)
            const validandoP2 = validarLetrasNum(placa)
            if(validandoM2 && validandoP2){
            document.getElementById('veh2').style.marginBottom="18px";
            document.getElementById('vinput2').value=document.getElementById('vplaca2').value;
            document.getElementById('oculto2').style.display="block";
            ventanaEmergente2.style.display = "none";
            mostrarVentana2.style.display="none";
            }else{
                mostrarVentana2.style.display="block";
            }

         @endif
         @if(isset($resultados[2]))
            const modelo3 = document.getElementById('vehiculomodelo3')
            const placa3 = document.getElementById('vplaca3')
            const validandoM3 = validarLetras(modelo)
            const validandoP3 = validarLetrasNum(placa)

            if(validandoM3 && validandoP3){
            document.getElementById('veh3').style.marginBottom="18px";
            document.getElementById('vinput3').value=document.getElementById('vplaca3').value;
            document.getElementById('oculto3').style.display="block";
            ventanaEmergente3.style.display = "none";
            mostrarVentana3.style.display="none";
            }else{
                mostrarVentana3.style.display="block";
            }
            @endif
        };
 /////// para que el boton guardar se convierta si esta lleno 








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
            
            const modelo = document.getElementById('vehiculomodelo1')
            const placa = document.getElementById('vplaca')
            const validandoM = validarLetras(modelo)
            const validandoP = validarLetrasNum(placa)

            if(validandoM && validandoP){
                
                document.getElementById('veh1').style.marginBottom="18px";
                document.getElementById('vinput').value=document.getElementById('vplaca').value;
                document.getElementById('oculto').style.display="block";
                ventanaEmergente.style.display = "none";
                mostrarVentana.style.display="none";
            }else{
                mostrarVentana.style.display="block";
            }
        };

        guardar2.onclick = function() {
            const modelo = document.getElementById('vehiculomodelo2')
            const placa = document.getElementById('vplaca2')
            const validandoM = validarLetras(modelo)
            const validandoP = validarLetrasNum(placa)
            if(validandoM && validandoP){
            document.getElementById('veh2').style.marginBottom="18px";
            document.getElementById('vinput2').value=document.getElementById('vplaca2').value;
            document.getElementById('oculto2').style.display="block";
            ventanaEmergente2.style.display = "none";
            mostrarVentana2.style.display="none";
            }else{
                mostrarVentana2.style.display="block";
            }
        };

        guardar3.onclick = function() {
            const modelo = document.getElementById('vehiculomodelo3')
            const placa = document.getElementById('vplaca3')
            const validandoM = validarLetras(modelo)
            const validandoP = validarLetrasNum(placa)

            if(validandoM && validandoP){
            document.getElementById('veh3').style.marginBottom="18px";
            document.getElementById('vinput3').value=document.getElementById('vplaca3').value;
            document.getElementById('oculto3').style.display="block";
            ventanaEmergente3.style.display = "none";
            mostrarVentana3.style.display="none";
            }else{
                mostrarVentana3.style.display="block";
            }
        };




      </script>

      <script>
        function validarLetras(input) {
        let isValid = false;
        const message = document.getElementById('messageM');
        input.willValidate = false;
        const maximo = 20;
        const pattern = new RegExp('^[A-Z]+$', 'i');

        if(!input.value) {
            isValid = false;
        } else {
            if(input.value.length > maximo) {
            isValid = false;
            } else {
            if(!pattern.test(input.value)){ 
                isValid = false;
            } else {
                isValid = true;
            }
            }
        }

        if(!isValid) {
            message.hidden = false;
        } else {
            message.hidden = true;
        }

        return isValid;
        }
      </script>

      <script>
        function validarLetrasNum(input) {
        let isValid = false;
        const message = document.getElementById('messageP');
        input.willValidate = false;
        const maximo = 8;
        const pattern = new RegExp('^[A-Z 0-9]+$' ,'i');

        if(!input.value) {
            isValid = false;
        } else {
            if(input.value.length > maximo) {
            isValid = false;
            } else {
            if(!pattern.test(input.value)){ 
                isValid = false;
            } else {
                isValid = true;
            }
            }
        }

        if(!isValid) {
            message.hidden = false;
        } else {
            message.hidden = true;
        }

        return isValid;
        }

        function prueba(){
            console.log("existe valor antiguo")
        }
      </script>

    @endsection
    @section('botones')
    
</div>
<div class="AbBotones">
    <a id="link" href="{{('/lobby/ListaClientes')}}"> 
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
