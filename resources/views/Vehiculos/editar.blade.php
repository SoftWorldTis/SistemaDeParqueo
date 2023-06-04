@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroCliente.css')}}" >  
@endsection
@section('forminicio')
<form action="/editar-vehiculo/{{$vehiculo->vehiculoid}}" method="post">
@csrf
@endsection


@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Registro de Vehiculos</p>
        @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
        @endif
    </div>
       
        <div class="fila3">
            
            <div class ="Ci">
                <p class="nom">CI</p>
                <input type="text" class="linea" name="ci" value="{{$vehiculo->user->ci}}" placeholder="Ingrese su CI " readonly>
                @error('ci')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="carro1">
                <p class="nom" id="veh1">Vehículo 1</p>
                <div class=" oculto" id="oculto">
                 <input type="text" class="linea" name="clienteV1" id="vinput" value="{{$vehiculo->vehiculoplaca}}" readonly>
                 <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar" >
                </div>
                @error('clienteV1')
                    <div class="error">
                        {{$message}}
                    </div> 
                @enderror
                
                
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
                <input type="text" class="linea3" name="vehiculomodelo" id="vehiculomodelo1"  value="{{$vehiculo->vehiculomodelo}}">
                <div id="messageM" class="error" hidden>
                    Introduzca solo letras. Máximo 20 caracteres.
                </div>
            </div>
            <div class="Placa inputmodal">
                <p class="nom2" data-lastchar="*">Placa  </p>
                <input type="text" class="linea3"id="vplaca" name="vehiculoplaca" value="{{$vehiculo->vehiculoplaca}}">
                <div id="messageP" class="error" hidden>
                    Introduzca solo letras y/o números. Máximo 8 caracteres.
                </div>
            </div>
            <div class="descripcion inputmodal">
                <p class="nom2" >Descripción</p>
                <input type="text" class="linea3" name="vehiculodescripcion" value="{{$vehiculo->vehiculodescripcion}}" >
            </div>
           
        </div>
        <button type="button" id="guardar-modal" class="guardar button guardar-modal">
        
            <p  style="font-size: 20px">Guardar</p>
        
        </button>   
            
         </div>      
    </div>
    </div>



      <script>
        var editar = document.getElementById('editar');
        var cerrarVentana = document.getElementById('cerrar-ventana');
        var ventanaEmergente = document.getElementById('mi-ventana-emergente');
        var guardar = document.getElementById('guardar-modal');

        
        editar.onclick = function() {
      
        ventanaEmergente.style.display = "block";

        };
        
        cerrarVentana.onclick = function() {

          ventanaEmergente.style.display = "none";
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
            }else{
                ventanaEmergente.style.display = "block";
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
    <a id="link" href="{{('/editar-vehiculo')}}"> 
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