<?php

namespace App\Http\Controllers;

use App\Models\estacionamiento;
use App\Rules\superior;
use App\Rules\telefono;
use Illuminate\Http\Request;

class RegisParqueoController extends Controller
{
    public function index(Request $request){
        
    return view('registroParqueo');


    }
    public function store(Request $request){
      //dd($request);

        $request-> validate([
          'estacionamientozona'=> ['required','min:3','max:25', new superior],
          'estacionamientocorreo'=> ['required','email','min:10','max:25', new superior], 
          'estacionamientohoraCierre'=> ['required',
            function ($attribute, $value, $fail) use ($request) {
                if ($value < $request['estacionamientohoraInicio']) {
                    $fail('ingrese un hora inicial mayor a la de cierre'); } }],
          'estacionamientotelefono' =>  ['required',new telefono ], 
          'estacionamientositioAdministrador'=>['required','numeric','min:10','max:200'],
          'estacionamientositioDocente'=>['required','numeric','min:10','max:200'],
          'estacionamientoprecio'=>['required','numeric','min:1','max:200'],
          'estacionamientoimagen' => ['required','image','mimes:jpeg,png,jpg','max:2048'],
        ]);
      
        $imageName = time().'.'.$request->estacinamientoimagen->extension();  
        $pathImg= $request->estacionamientoimagen->move(public_path('images'), $imageName);

        $estacionamiento =new estacionamiento();
        $estacionamiento -> estacionamientocorreo= $request->input('estacionamientocorreo');
        $estacionamiento -> estacionamientozona= $request->input('estacionamientozona');
        $estacionamiento -> estacionamientoprecio= $request->input('estacionamientoprecio');
        $estacionamiento -> estacionamientoqr= '1';
        $estacionamiento -> estacionamientoestado= 'activo';
        $estacionamiento -> estacionamientohoraInicio= $request->input('estacionamientohoraInicio');
        $estacionamiento -> estacionamientohoraCierre= $request->input('estacionamientohoraCierre');
        $estacionamiento -> estacionamientotelefono= $request->input('estacionamientotelefono');
        $estacionamiento -> estacionamientositioAdministrador= $request->input('estacionamientositioAdministrador');
        $estacionamiento -> estacionamientositioDocente= $request->input('estacionamientositioDocente');
        $estacionamiento -> estacionamientoImg= $imageName;

        $estacionamiento -> save();
        return view('registroParqueo');
        

        


    }

}


