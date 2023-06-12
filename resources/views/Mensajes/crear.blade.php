@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/mensajes.css')}}" >  
@endsection
@section('forminicio')
<form action="/enviar-mensaje" method="Post">
@csrf
@endsection


@section('contenido')
<div class="principal">

    <div class="tit">
        <p>Enviar Mensaje</p>
        @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
        @endif
    </div>
       
        <div class="fila3">

            <div class="carro1">
                <p class="nom" id="veh1">Destinatario</p>
                <input type="button" value ="Seleccionar"class="botonAgregar" name="carro1"  id="mostrar-ventana-emergente" >
                <div class=" oculto" id="oculto" style="display: none">
                 <input type="text" class="linea" name="Usuarios"  value="Seleccionado" readonly>
                 <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar" >
                </div>
                @error('usuarios')
                    <div class="error">
                        {{$message}}
                    </div> 
                @enderror
                
            </div>

            <div class ="Ci">
                <p class="nom">Encabezado</p>
                <input type="text" class="linea" name="titulo" value="{{old('titulo')}}" placeholder="Ingrese un encabezado">
                @error('titulo')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
        </div>
        
        <div class="fila3">
            <div class="carro1">
                <p class="nom">Mensaje</p>
       
                <textarea name="mensaje" id="mensaje" cols="30" rows="10" class="mensaje" 
                placeholder="Escriba un mensaje" >{{old('mensaje')}}</textarea>
                @error('mensaje')
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
        <h2>Seleccionar Destinatario</h2>
        <div class="checkcentreado">
            <input type="checkbox" id="checkTodo" name="usuarios[]" value="0" onclick="seleccionarTodo()">
            <label for="creaRol">Todos</label>
        </div>
        
        <div class="tabla-scroll">
            <table class="tabla" >
                <thead class="tablaTitulos">
                    <tr>
                        <th>Seleccionar</th>
                        <th>Usuario</th>
                        
                    
                    </tr>
                </thead>
                <tbody class="tablaContenido">
                    @foreach ( $usuarios as $usuario)    
                    
                    <tr class="table-row2"   id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                        <div class="checkcentreado">
                            <td>
                            <input type="checkbox" class="checkAuto" name="usuarios[]" value="{{$usuario->id}}"  onclick="updateTodos()">
                            </td>
                        </div> 
                        
                        <td>{{$usuario->name}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
        <button type="button" id="guardar-modal" class="guardar button guardar-modal">
        
            <p  style="font-size: 20px">Guardar</p>
        
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
       



        mostrarVentana.onclick = function() {
      
          ventanaEmergente.style.display = "block";

        };
        editar.onclick = function() {
      
      ventanaEmergente.style.display = "block";

    };
        
        cerrarVentana.onclick = function() {

          ventanaEmergente.style.display = "none";
        };


        guardar.onclick = function() {
            
            console.log("se envian datos")
            document.getElementById('oculto').style.display="block";
            ventanaEmergente.style.display = "none";
            mostrarVentana.style.display = "none";
        };


      </script>

      <script>
        function seleccionarTodo(){
            var checkboxTodos = document.getElementById('checkTodo');
            var checkboxes = document.getElementsByClassName('checkAuto');
        
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = checkboxTodos.checked;
            }
        }

        function updateTodos() {
            var checkboxTodos = document.getElementById('checkTodo');
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var allChecked = true;

            checkboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });

            checkboxTodos.checked = allChecked;
        }
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