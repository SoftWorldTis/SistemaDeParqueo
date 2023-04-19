<head>
    <link rel="stylesheet" href="{{asset('/dash/css/registroalquiler.css')}}" >    
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@extends('layouts.menu2')

<form action="/lobby/Alquiler" method="POST">
   @csrf
    @section('contenido')
        <div class="principal">

            <div class="tit">
                <p> Alquilar sitio del parqueo</p>
            </div>
            
            <div class="botonesformu">
                
                <div class ="agregarParqueo">
                    <p class="nom">Parqueo</p>
                    <input class="botonAgregar" class="agregarP"type="button" value="Agregar" id="parqueo" onclick="sitios()">
                </div>
                
                <div class ="agregarUsuario">
                    <p class="nom">Usuario</p>
                    <input class="botonAgregar" class="agregarU"type="button" value="Agregar" onclick="">
                </div>
            </div>
            
            <div class="fila2">
                
                <div  class="Duracion">
                    <p class="nom">Duración</p>
                    
                        <input type="date" name="FechaInicio" class="linea fecha " id="FechaInicio" value="{{old('FechaInicio')}}" onchange="prueba()">
                        @error('FechaInicio')
                            <div class="error">
                                {{$message}}
                            </div>
                        @enderror
                    
                    <div>
                        <input type="date" name="FechaFin" class="linea2 fecha" id = "FechaFin" value="{{old('FechaFin')}}" onchange="prueba()">
                        @error('FechaFin')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    
                </div>
                <div class="Horario">
                    <p class="nom">Horario</p>
                    <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                    <input type="text" class="linea" readonly="readonly" id="Horario">
                    
                    
                </div>
            </div>

            <div class="fila3">
                <div class="seleccion">
                <p class="nom">Sitio</p>
                    <select name="Sitio" class="linea" class="sitio" id="sitio" value="{{old('Sitio')}}">   
                        <option value=""></option>  
                    </select>
                    
                    @error('Sitio')
                        <div class="error">
                            {{$message}}
                        </div>
                    @enderror
            </div>
            
            <div class="Precio">
                <p class="nom">Precio</p>
                <!--readonly es para evitar su edicion en la vista (creo que se rellana automaticamente)-->
                
                    <input type="text" class="linea" id="Precio" readonly="readonly" value="0"> 
               
                
            </div>

            </div>

            <div class="fila4">
                <div class="rad">
                    <label class="nom2">
                        <input type="radio" class=pagar name="Pago" value="QR" id="Ahora" {{old('Pago') == 'QR' ? 'checked' : ''}}>
                        Pagar Ahora
                    </label>
                    @error('Pago')
                    <div class="error">
                    {{$message}}
                    </div>
                @enderror
                </div>
                <div class="rad">
                    <label class="nom2">
                        <input type="radio" class=pagar name="Pago" value="Efectivo" id="Despues" {{old('Pago') == 'Efectivo' ? 'checked' : ''}}>
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


<!--Aqui estan todos los scripts se controlan la vista desde el fornt-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script>
    function prueba(){
        var fechaIni = $('#FechaInicio').val();
        var fechaFin = $('#FechaFin').val();
        if(fechaIni!= "" && fechaFin != ""){
            var dias = calcularDias(fechaIni, fechaFin)
            if(dias>0){
                const parqueo= @json($parqueos);
                console.log("q", parqueo);
                const precio = parqueo[0].estacionamientoprecio * (dias+1)
                document.getElementById('Precio').value=precio
            }else{
                document.getElementById('Precio').value=0
            }
        }
    }
</script>

<script>
    function calcularDias(fecha1, fecha2){
        var f1=new Date(fecha1);
        var f2= new Date(fecha2);
        //console.log("fechaIni", f1.getDate())
        return  (f2-f1)/(1000 * 60 * 60 * 24)
    }
</script>

<script type="text/javascript">
    function sitios() {
        const parqueo= @json($parqueos);
        const sitioAdm = parqueo[0].estacionamientositioAdministrador
        const sitioSelect = document.getElementById('sitio')
        for(var i=1; i<= sitioAdm; i++){
            let opcion = document.createElement('option')
            opcion.value = i
            opcion.text = "Espacio "+i+" Adm"
            sitioSelect.add(opcion);
        }
        
    }
</script>

<script>
    function Horario(){
        const parqueo= @json($parqueos);
        const horaIni = parqueo[0].estacionamientohoraInicio
        const horaFin = parqueo[0].estacionamientohoraICierre
        document.getElementById('Precio').value=horaIni+"   -   "+horaFin
    }
    
</script>
        
    