@extends('layouts.menu2')





@section('css')
    <link rel="stylesheet" href="{{asset('/dash/css/listaClientes.css')}}" > 
@endsection

@section('contenido')
<div class="herramientas">

    <div class="ParAr">
        <p> Usuarios</p>
    </div>
  
    <div  class="ParMed">
        <div class="buscador" id="buscador">
            <input type="text" class="linea" id="buscadorinput" value="{{old('buscadorinput')}}" >
            <button type="button" class="botonBuscar"> <img src="{{asset('/dash/assets/lupita_icono.png')}}" class="lupa" alt="">    </button>
        </div>

        <button type="button" class="botonExportar"> <p> Exportar </p> </button>
   
    </div>

    <div  class="ParAb">
        <table class="tablaCli">
            <thead class="tablaTitulos">
              <tr>
                <th>Numero</th>
                <th>Usuario</th>
                <th>CI</th>
                <th>SIS</th>
                <th>Vehiculo 1</th>
                <th>Vehiculo 2</th>
                <th>Vehiculo 3</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody class="tablaContenido">
              
              <tr>
                <td>32</td>
                <td>María</td>
                <td>Argentina</td>
                <td>Argentina</td>
                <td>Argentina</td>
                <td>Argentina</td>
                <td>Argentina</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>

              </tr>
              <tr>
                <td>19</td>
                <td>Pedro</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>
              </tr>

              <tr>
                <td>19</td>
                <td>Pedro</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>
              </tr>

              <tr>
                <td>19</td>
                <td>Pedro</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>
              </tr>

              <tr>
                <td>19</td>
                <td>Pedro</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>
              </tr>

              <tr>
                <td>19</td>
                <td>Pedro</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>Colombia</td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Eliminar</a>
                </td>
              </tr>
            </tbody>
        </table>

    </div>

    
</div>



@endsection