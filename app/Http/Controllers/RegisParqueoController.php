<?php

namespace App\Http\Controllers;

use App\Models\estacionamiento;
use Illuminate\Http\Request;

class RegisParqueoController extends Controller
{
    public function index(){
        
    return view('registroParqueo');

    }
    public function store(Request $request){

        $estacionamiento =new estacionamiento();
        $estacionamiento -> estacionamientocorreo= $request->input('estacionamientocorreo');
        $estacionamiento -> estacionamientozona= $request->input('estacionamientozona');
        $estacionamiento -> estacionamientohorario= $request->input('estacionamientohorario');
        $estacionamiento -> estacionamientositioDocente= $request->input('estacionamientositioDocente');
        $estacionamiento -> estacionamientoprecio= $request->input('estacionamientoprecio');
        $estacionamiento -> estacionamientoestado= 'activo';
        $estacionamiento -> estacionamientositioAdministrador= $request->input('estacionamientositioAdministrador');
        $estacionamiento -> estacionamientotelefono= $request->input('estacionamientotelefono');
        $estacionamiento -> estacionamientoqr= '1';
        $estacionamiento -> save();
        return view('registroParqueo');
        



    }

}


