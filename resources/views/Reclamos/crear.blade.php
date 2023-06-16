@extends('layouts.menu2')

@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/botones.css')}}" >
    <link rel="stylesheet" href="{{asset('/dash/css/registroReclamo.css')}}" >  
@endsection
@section('forminicio')
<form action="/crear-reclamos" method="Post">
@csrf
@endsection


@section('contenido')
<div class="principal">

    <div class="tit">
        <p> Registro de Reclamos</p>
        @if ($message = Session::get('Registrado'))
                <div class="valido">
                    <span>{{$message}}</span>
                </div>
        @endif
    </div>
       
        <div class="fila3">
            
            <div class ="Ci">
                <p class="nom">Asunto</p>
                <input type="text" class="linea" name="reclamotitulo" value="{{old('reclamotitulo')}}" placeholder="Ingrese su Asunto ">
                @error('reclamotitulo')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class ="Ci">
                <p class="nom">Descripcion</p>
                <textarea name="reclamodescripcion" id="reclamodescripcion" cols="30" rows="10" class="mensaje" 
                placeholder="Describa su asunto aquí..." >{{old('reclamodescripcion')}}</textarea>
                @error('reclamodescripcion')
                    <div class="error">
                        {{$message}}
                    </div>
                @enderror
            </div>

                  
        </div>
       
        







     
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