<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    public function index(Request $request){
        
        return view('Salidas.ver-salidas');
    
    
        }

    

}
