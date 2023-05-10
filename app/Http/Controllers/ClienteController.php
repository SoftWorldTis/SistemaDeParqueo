<?php

namespace App\Http\Controllers;
use App\Models\cliente;
use App\Models\vehiculo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request){
        
        return view('registroCliente');
    
    
        }

     public function store(ClienteRequest $request){  
       
     
     
   
      
        $cliente =new cliente();
        $cliente -> clienteci= $request->input('clienteci');
        $cliente -> clientesis= $request->input('clientesis');
        $cliente -> clientenombrecompleto= $request->input('clientenombrecompleto');
        $cliente -> clientefechanac= $request->input('clientefechanac');
        $cliente -> clientecorreo= $request->input('clientecorreo');
        $cliente-> save();
 

        $vehiculo =new vehiculo();
        $vehiculo -> vehiculomodelo= $request->input('vehiculomodelo');
        $vehiculo -> vehiculoplaca= $request->input('vehiculoplaca');
        $vehiculo -> vehiculodescripcion= $request->input('vehiculodescripcion');
        $vehiculo -> cliente_clienteci=$request->input('clienteci');
        $vehiculo-> save();

        if($request->input('vehiculomodelo2')){
            $vehiculo =new vehiculo();
            $vehiculo -> vehiculomodelo= $request->input('vehiculomodelo2');
            $vehiculo -> vehiculoplaca= $request->input('vehiculoplaca2');
            $vehiculo -> vehiculodescripcion= $request->input('vehiculodescripcion2');
            $vehiculo -> cliente_clienteci= $request->input('clienteci');
            $vehiculo-> save();

        }

        if($request->input('vehiculomodelo3')){
            $vehiculo =new vehiculo();
            $vehiculo -> vehiculomodelo= $request->input('vehiculomodelo3');
            $vehiculo -> vehiculoplaca= $request->input('vehiculoplaca3');
            $vehiculo -> vehiculodescripcion= $request->input('vehiculodescripcion3');
            $vehiculo -> cliente_clienteci= $request->input('clienteci');
            $vehiculo-> save();

        }


        //return view('registroCliente'); 
        return back() -> with('Registrado', 'Cliente registrado correctamente');
     }

  


}
