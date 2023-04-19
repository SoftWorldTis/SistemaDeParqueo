<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardiaRequest;
use App\Models\guardia;

use Illuminate\Http\Request;

class GuardiaController extends Controller
{
    public function index(Request $request){
        
        return view('registroGuardia');
    
    
        }

     public function store(GuardiaRequest $request){  
        
        
        $guardia =new guardia();
        $guardia -> guardiacorreo= $request->input('guardiacorreo');
        $guardia -> guardianombre= $request->input('guardianombre');
        $guardia -> guardiahoraentrada= $request->input('guardiahoraentrada');
        $guardia -> guardiahorasalida= $request->input('guardiahorasalida');
        $guardia -> guardiaci= $request->input('guardiaci');
        $guardia -> guardiafechanacimiento= $request->input('guardiafechanacimiento');
        //$guardia -> estacionamiento_estacionamientoid='7' ;
        $guardia-> save();
        return view('registroGuardia'); 
     }
}
