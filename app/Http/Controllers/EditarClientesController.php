<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\vehiculo;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarClienteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EditarClientesController extends Controller
{
  



    public function index($idd ){
        $cliente = Cliente::find($idd);
        $resultados = DB::select('SELECT * FROM vehiculo WHERE cliente_clienteci = ?', [$cliente->clienteci]);

        return view('EditarCliente', compact('cliente', 'resultados') );
    
    
        }

     public function update(EditarClienteRequest $request , $idd){  
       
    // Obtener el cliente existente
    $cliente = Cliente::findOrFail($request->input('clienteci'));

    // Actualizar los campos del modelo con los datos del formulario
    $cliente->clienteci= $request->input('clienteci');
    $cliente->clientenombrecompleto = $request->input('clientenombrecompleto');
    $cliente->clientefechanac = $request->input('clientefechanac');
    $cliente->clientecorreo = $request->input('clientecorreo');
    $cliente->clientesis= $request->input('clientesis');
    $cliente->save();

    $cliente->vehiculos()->delete();

    // Eliminar los vehículos existentes del cliente
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
        return redirect()->route('lobby.vercliente');

     }

  

}
