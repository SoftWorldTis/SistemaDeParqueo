@extends('layouts.menu2')


@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" > 
  @endsection  

  @section('forminicio')
  <form action="/crear-alquiler" method="Post">
    @csrf <!-- debajo de un forms pones eso atte kiri-->

  @endsection

@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Alquilar sitio del parqueo</p>
        @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
        @endif
    </div>

        <div class="botonesformu">
            

            <div class ="agregarParqueo">
                <p class="nom">Parqueo</p>
                <input type="button" value ="Agregar"class="botonAgregarP" name="botonparqueo"  id="mostrarEmergente" >
                <div class=" oculto" id="oculto" >
                    <input type="text" class="linea" name="Parqueo" id="parqueodatos" value="{{$seleccionadoes}}" readonly>
                    <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar" id="editar" >
                    @if($seleccionado != null)
                    <input type="hidden" class="linea" name="parqueoid" id="parqueoid"  value="{{$seleccionado->estacionamientoid}}" readonly >
                    @endif
                   
                </div>
                @error('Parqueo')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
    
            </div>
          
     
            <div class ="agregarUsuario">
                <p class="nom">Usuario</p>
                <!--cambiar type="button" y value ="Agregar"-->

                <input class="botonAgregarU" class="agregarU" type="button" value="Agregar" name="nombre"  id="mostrarEmergente2"onclick="">
                <div class=" oculto2" id="oculto2">
                    <!-- input donde sacar el dato de parqueo-->
                    <input type="text" class="linea" name="Usuario" id="usuariosdatos"  value="{{old('Usuario')}}" readonly >
                    <img src="{{asset('/dash/assets/Lapiz.png')}}" alt="" class="editar2" id="editar2" >
                </div>
                   <input type="hidden" class="linea" name="usuariosdatosci" id="usuariosdatosci"  value="{{old('usuariosdatosci')}}" readonly >
                   @error('Usuario')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                    @error('usuariosdatosci')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
            </div>
        </div>
        
        <div class="fila2">
            
            <div  class="Duracion">
                <p class="nom">Duración</p>
                @if ($seleccionado)
                    <input type="date" name="FechaInicio" class="linea fecha " id="FechaInicio" value="{{old('FechaInicio')}}" onchange="calcularPrecio()">
                @else
                    <input type="date" name="FechaInicio" class="linea fecha " id="FechaInicio" value="{{old('FechaInicio')}}" >
                @endif
                
                    @error('FechaInicio')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
            
                <div>
                    @if ($seleccionado)
                        <input type="date" name="FechaFin" class="linea2 fecha" id = "FechaFin" value="{{old('FechaFin')}}" onchange="calcularPrecio()">
                    @else
                        <input type="date" name="FechaFin" class="linea2 fecha" id = "FechaFin" value="{{old('FechaFin')}}">
                    @endif
                    
                    @error('FechaFin')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                 </div>

            </div>

            <div class="Horario">
                <p class="nom">Horario</p>
                @if ($seleccionado)
                <input type="text" class="linea" name="hora" readonly value="{{$seleccionado->estacionamientohorainicio}} - {{$seleccionado->estacionamientohoracierre}}">
                @else
                <input type="text" class="linea" name="hora" readonly value="">
                @endif
                
                <br>
            </div>
        </div>
        <div class="fila3">
            <div class="seleccion">
                <p class="nom">Sitio</p>
                @if ($seleccionado)
                    <select name="sitio" id="sitio" class="linea" class="sitio" valorAnt="{{old('sitio')}}">
                        <option class= "linea" value="" selected>Seleccione un sitio</option>
                    </select>
                    @error('sitio')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                @else
                    <input type="text" class="linea" name="sitio" readonly value="Seleccione un parqueo">
                    @error('sitio')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                @endif
                
            </div>
            
            <div class="Precio">
                <p class="nom">Precio</p>
                <input type="text" class="linea" name="costo" id="Precio" readonly value="{{old('costo')}}" >
            </div>
            
        </div>
        
        <div class="fila4">
            <div class="rad">
                <label class="nom2">
                    <input type="radio" class=pagar name="Pago" value="QR" id="Ahora">
                    Pagar Ahora
                </label>
                <div>
                    @if ($seleccionado)
                    <img src="{{asset('images/'.$seleccionado->estacionamientoimagen)}}" alt="" width="150" height="150">
                @endif
                </div>
            </div>
            <div class="rad">
                <label class="nom2">
                    <input type="radio" class=pagar name="Pago" value="Efectivo" id="Despues" checked>
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
            <div class="table-conteiner2">
                <table class="tabla hoverable" >
                    <thead>
                        <tr >
                            <th class="grillatit">Número</th>
                            <th class="grillatit">Zona</th>
                            <th class="grillatit">Capacidad</th>
                            <th class="grillatit">Estado</th>
                            <th class="grillatit">Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $parqueo as $parqueos ) 
                        
                            <tr class="table-row" id="id=fila-{{$parqueos->estacionamientoid}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$parqueos->estacionamientozona}}</td>
                                <td>{{$parqueos->estacionamientositios}}</td>
                                <td>{{$parqueos->estacionamientoestado}}</td>
                                <td>
                                    <a href="/crear-alquiler/{{$parqueos->estacionamientoid}}">Seleccionar</a>
                                </td>
                            
                            </tr>
                          
                       
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
           
        </div>
      </div>
      
      <div id="miEmergente2" class="emergente">
        <div class="ordenar2">

            <div class="azul2" >
                 
            <button type="button" class="destructor2" id="cerrar-ventana2">x</button>
            </div>
            <div class="titu">
                <p>Seleccionar Cliente</p>
            </div>
            <div class="table-conteiner">

                <table class="tabla2 hoverable2" >
                    <thead>
                        <tr>
                            <th class="grillatit">Número</th>
                            <th class="grillatit">Usuario</th>
                            <th class="grillatit">CI</th>
                        
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ( $clientes as $key => $clientess)    
                        
                        <tr class="table-row2"   id="id=fila-{{$loop->iteration}} " style="height: 61px;">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$clientess->name}}</td>
                            <td>{{$clientess->ci}}</td>
                     
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                
        </div>
      </div>
      <script>

{!! $js !!}
   

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
          
        }
        var mostrarVentana2 = document.getElementById('mostrarEmergente2');
        var cerrarVentana2 = document.getElementById('cerrar-ventana2');
        var ventanaEmergente2 = document.getElementById('miEmergente2');
        var general2= document.getElementById('principal');
        var barrita2= document.getElementById('azul2');
        mostrarVentana2.onclick = function() {
          ventanaEmergente2.style.display = "block";
          barrita2.style.backgroundColor = "#0A1C44";
          barrita2.style.width = "300px";
          
        }

        cerrarVentana2.onclick = function() {
          ventanaEmergente2.style.display = "none";
          
        };


      </script>
<script>

    //scrip para seleccionar de la tabla y guardarlo de parqueo y cambiarlo x texto
   editar.onclick = function() {
      
      ventanaEmergente.style.display = "block";

    };

    $(document).ready(function() {
      $(".table-row").mouseover(function() {
        $(this).addClass("highlight");
      });
      
      $(".table-row").mouseout(function() {
        $(this).removeClass("highlight");
      });
      
      $(".table-row").click(function() {
        var fila_id = $(this).attr("id");
        var dato_id = fila_id.split("-")[1];
        console.log(dato_id)
        $("#parqueoid").val(dato_id);
        var value = $(this).find("td:nth-child(2)").text();
        
        $("#parqueodatos").val(value);
        document.getElementById('miEmergente').style.display = "none";
        document.getElementById('mostrarEmergente').style.display = "none";
        document.getElementById('oculto').style.display="block";
      });
    });




    editar2.onclick = function() {
      
      ventanaEmergente2.style.display = "block";
    };

    $(document).ready(function() {
      $(".table-row2").mouseover(function() {
        $(this).addClass("highlight");
      });
      
      $(".table-row2").mouseout(function() {
        $(this).removeClass("highlight");
      });
      
      $(".table-row2").click(function() {
        var fila_id = $(this).attr("id");
        var dato_id = fila_id.split("-")[1];
        var value = $(this).find("td:nth-child(2)").text();
        $("#usuariosdatos").val(value);
        var value2 = $(this).find("td:nth-child(3)").text();
        $("#usuariosdatosci").val(value2);
        document.getElementById('miEmergente2').style.display = "none";
        document.getElementById('mostrarEmergente2').style.display = "none";
        document.getElementById('oculto2').style.display="block";
      });
    });

    var input = document.getElementById("usuariosdatos");

        if (input.value !== "") {
        console.log("El campo de entrada tiene un valor");
        document.getElementById('mostrarEmergente2').style.display = "none";
        document.getElementById('oculto2').style.display="block";
        } 
  </script>

@if ($seleccionado)
<script>
    function calcularPrecio(){
        var fechaIni = $('#FechaInicio').val();
        var fechaFin = $('#FechaFin').val();
        if(fechaIni!= "" && fechaFin != ""){
            var dias = calcularDias(fechaIni, fechaFin)
            //console.log(dias)
            if(dias>=0){
                const precio= @json($seleccionado->estacionamientoprecio);
                const total = precio * (dias+1)
                document.getElementById('Precio').value=total
                
            }else{
                document.getElementById('Precio').value=0
            }
        }
    }
    
    function calcularDias(fecha1, fecha2){
        var domingos = [];
        var f1=new Date(fecha1);
        var f2= new Date(fecha2);
        while (f1 <= f2) {
            //console.log(f1.getDay())
        if (f1.getDay() === 6) { 
            domingos.push(f1.toISOString().split('T')[0]);
        }

            f1.setDate(f1.getDate() + 1);
        }

        if (domingos.length > 0) {
            var menos = domingos.length;
        } else {
            var menos = 0;
        }
        var f01 = new Date(fecha1);
        return  (f2-f01)/(1000 * 60 * 60 * 24)-menos
    }

    function sitios() {
        var valorAntiguo = "{{ old('sitio') }}";
        const sitios= @json($seleccionado->estacionamientositios);
        const sitioSelect = document.getElementById('sitio')
        for(var i=1; i<= sitios; i++){
            let opcion = document.createElement('option')
            opcion.value = i
            opcion.text = "Espacio "+i
            if (valorAntiguo == i) {
                opcion.selected = true;
            }
            sitioSelect.add(opcion);
        }  
    }

    document.addEventListener("DOMContentLoaded", function() {
        sitios();
  });
</script>
@endif

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



