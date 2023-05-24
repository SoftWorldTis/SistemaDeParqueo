<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\estacionamiento;
use App\Models\vehiculo;

class VehiculoController extends Controller
{   public function index(Request $request){

    return view('registrar_vehiculo');


    }
    public function store(Vehiculo $request){
      //dd($request);

        if ($request->hasFile('estacionamientoimagen')) {
            $archivo = $request->file('estacionamientoimagen');
            if ($archivo->isValid()) {
                $imageName = time().'.'.$request->estacionamientoimagen->extension();
                $pathImg= $request->estacionamientoimagen->move(public_path('images'), $imageName);

                $vehiculo =new vehiculo();
                $vehiculo ->vehiculonombreyapellido= $request->input('vehiculonombreyapellido');
                $vehiculo -> estacionamientozona= $request->input('vehiculoplaca1');
                $vehiculo -> estacionamientoprecio= $request->input('vehiculoplaca2');
                $vehiculo -> estacionamientoprecio= $request->input('vehiculoplaca2');
                $vehiculo -> estacionamientoestado= 'activo';
                $vehiculo-> estacionamientoImg= $imageName;

                $vehiculo -> save();
                return back() -> with('Registrado', 'Parqueo registrado correctamente');

            }
        }else{
        return back() -> with('Mal', 'Algo salió mal');
        }
    }

}
