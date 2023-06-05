@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/entradas-salidas.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p>Registro de salida</p>
    </div>

    <div class="ParMed">
        <div class="buscador" id="buscador">
          <input type="text" class="linea" id="buscadorinput" name="buscador" value="" placeholder="Buscar..." >
          <button type="submit" id="search-button"  class="botonBuscar"> 
            <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">
          </button>
        </div>
      </form>
  
    
    </div>
  
    <div  class="ParAb"  >
        <table class="tabla" >
            <thead class="tablaTitulos">
              <tr>
                <th>Numero</th>
                <th>Parqueo</th>
                <th>Usuario</th>
                <th>Placa</th>
                <th>Hora de ingreso</th>
                <th>Sitio</th>
                <th>Marcar</th>
              </tr>
            </thead>
            <tbody id="table-body" class="tablaContenido">
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                
                </tr>
        
              </tbody>
                  
  
        </table>
        
    </div>

  
</div>


 
@endsection
