<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardiaRequest;
use App\Models\estacionamiento;
use App\Models\guardia;

use Illuminate\Http\Request;

class GuardiaController extends Controller
{
    public function index(){
        $parqueos = estacionamiento::all();
        return view('registroGuardia', compact('parqueos'));
    
    
        }

     public function store(GuardiaRequest $request){  
        $guardia =new guardia(); 
        $guardia -> estacionamiento_estacionamientoid=$request->input('guardiaparqueo') ;
        $guardia -> guardiacorreo= $request->input('guardiacorreo');
        $guardia -> guardianombre= $request->input('guardianombre');
        $guardia -> guardiahoraentrada= $request->input('guardiahoraentrada');
        $guardia -> guardiahorasalida= $request->input('guardiahorasalida');
        $guardia -> guardiaci= $request->input('guardiaci');
        $guardia -> guardiafechanacimiento= $request->input('guardiafechanacimiento');
        $guardia-> save();
        $parqueos = estacionamiento::all();
        //return view('registroGuardia',compact('parqueos'));
        return back() -> with('Registrado', 'Guardia registrado correctamente');
     }

}
