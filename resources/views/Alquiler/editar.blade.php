@extends('layouts.menu2')


@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" > 
  @endsection  

  @section('forminicio')
  <form action="/editar-alquiler/{{$usuario->id}}" method="Post">
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
                <input type="text" class="linea" name="Parqueo" id="parqueodatos" value="{{$parqueo->estacionamientozona}}" readonly>

                @error('Parqueo')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
    
            </div>
          
     
            <div class ="agregarUsuario">
                <p class="nom">Usuario</p>
                <input type="text" class="linea" name="Usuario" id="usuariosdatos"  value="{{$usuario->name}}" readonly >

                @error('Usuario')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="fila2">
            
            <div  class="Duracion">
                <p class="nom">Duración</p>
                    <input type="date" name="FechaInicio" class="linea fecha " id="FechaInicio" value="{{old('FechaInicio')}}" onchange="calcularPrecio()">
               
                    @error('FechaInicio')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
            
                <div>
                    <input type="date" name="FechaFin" class="linea2 fecha" id = "FechaFin" value="{{old('FechaFin')}}" onchange="calcularPrecio()">
                    
                    
                    @error('FechaFin')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                 </div>

            </div>

            <div class="Horario">
                <p class="nom">Horario</p>
                <input type="text" class="linea" name="hora" readonly value="{{$parqueo->estacionamientohoraInicio}} - {{$parqueo->estacionamientohoraCierre}}">
               
                
                <br>
            </div>
        </div>
        <div class="fila3">
            <div class="seleccion">
                <p class="nom">Sitio</p>
                <select name="sitio" id="sitio" class="linea" class="sitio" valorAnt="{{old('sitio')}}">
                    <option class= "linea" value="" selected>{{$alquiler->alquilerSitio}}</option>
                </select>
                @error('sitio')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
                
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
                    <img src="{{asset('images/'.$parqueo->estacionamientoImg)}}" alt="" width="150" height="150">
              
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
 

@if ($parqueo)
<script>
    function calcularPrecio(){
        var fechaIni = $('#FechaInicio').val();
        var fechaFin = $('#FechaFin').val();
        if(fechaIni!= "" && fechaFin != ""){
            var dias = calcularDias(fechaIni, fechaFin)
            //console.log(dias);
            if(dias>=0){
                const precio= @json($parqueo->estacionamientoprecio);
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
        const sitios= @json($parqueo->estacionamientositios);
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