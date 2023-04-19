<?php

namespace App\Http\Controllers;
use App\Models\guardia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Guardia2Controller extends Controller
{public function index(Request $request){
        
    return view('registroGuardia');


    }

 public function store(Request $request){  
    
    
    $guardia =new guardia();
    $guardia -> guardiacorreo= $request->input('guardiacorreo');
    $guardia -> guardianombre= $request->input('guardianombre');
    $guardia -> guardiahoraentrada= $request->input('guardiahoraentrada');
    $guardia -> guardiahorasalida= $request->input('guardiahorasalida');
    $guardia -> guardiaci= $request->input('guardiaci');
    $guardia -> guardiafechanacimiento= $request->input('guardiafechanacimiento');
    $guardia -> estacionamiento_estacionamientoid='1' ;
    $guardia-> save();
    return view('registroGuardia');
 }
}
