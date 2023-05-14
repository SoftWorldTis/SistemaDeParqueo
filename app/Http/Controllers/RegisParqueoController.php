<?php

namespace App\Http\Controllers;

use App\Models\estacionamiento;
use App\Rules\superior;
use App\Rules\telefono;
use Illuminate\Http\Request;
use App\Http\Requests\ParqueoRequest;

class RegisParqueoController extends Controller
{
    public function index(Request $request){
        
    return view('registroParqueo');


    }
    public function store(ParqueoRequest $request){
      //dd($request);
      
        if ($request->hasFile('estacionamientoimagen')) {
            $archivo = $request->file('estacionamientoimagen');
            if ($archivo->isValid()) {
                $imageName = time().'.'.$request->estacionamientoimagen->extension();  
                $pathImg= $request->estacionamientoimagen->move(public_path('images'), $imageName);

                $estacionamiento =new estacionamiento();
                $estacionamiento -> estacionamientocorreo= $request->input('estacionamientocorreo');
                $estacionamiento -> estacionamientozona= $request->input('estacionamientozona');
                $estacionamiento -> estacionamientoprecio= $request->input('estacionamientoprecio');
                $estacionamiento -> estacionamientoestado= 'activo';
                $estacionamiento -> estacionamientohoraInicio= $request->input('estacionamientohoraInicio');
                $estacionamiento -> estacionamientohoraCierre= $request->input('estacionamientohoraCierre');
                $estacionamiento -> estacionamientotelefono= $request->input('estacionamientotelefono');
                $estacionamiento -> estacionamientositios= $request->input('estacionamientositios');
                $estacionamiento -> estacionamientoImg= $imageName;

                $estacionamiento -> save();
                return back() -> with('Registrado', 'Parqueo registrado correctamente');

            }
        }else{
          return back() -> with('Mal', 'Algo salió mal');
        }
    }

}


