<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\rol_funcionalidad;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index (){
        return view('registrarRol');
    }


    public function store(Request $request)
    {
       /////aqui se añade manualmente la funci y la ref a la base , si tenemos el añadir
       //funcionalidad entonces se cambia esta forma pero el resto ta bien 
       //y de alguna forma la consulta manual que hago de cada uno se crearia automatico 


        //aqui se crea el rol de momento hare todo en admin :3

        // aqui se verifica si el checkbox esta seleccionado y si esta hace la consulta para agregar la func al rol
        $opcionSeleccionada = $request->input('crearRol');
        if ($opcionSeleccionada) {
            $rol_func =new rol_funcionalidad();
            //de momento le dare el id directo del admin
            //pero luego deberias poder extraer el id y buscar por id  como lo comentado de abajo
            $rol_func -> rf_rolid='2';
            $rol_func -> rf_funcionalidadid='1';
            $rol_func-> save();
            //aqui se supone que extrae el nombre entonces debe buscar el id del nombre del input
            //y eso meterlo aqui  
           // $rol_func -> rf_rolid=$request->input('rolnombre');
            //
        }
        //aqui le cambio el  checkbox que referimos  y consultamos si esta seleccionado
        $opcionSeleccionada = $request->input('editRol');
        if ($opcionSeleccionada) {
            $rol_func =new rol_funcionalidad();
            //de momento le dare el id directo del admin
            //pero luego deberias poder extraer el id y buscar por id  como lo comentado de abajo
            $rol_func -> rf_rolid='2';
            $rol_func -> rf_funcionalidadid='2';
            $rol_func-> save();
            //aqui se supone que extrae el nombre entonces debe buscar el id del nombre del input
            //y eso meterlo aqui  
           // $rol_func -> rf_rolid=$request->input('rolnombre');
            //
        }

        return redirect()->route('lobby.inicio');
    }



}
