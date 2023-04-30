<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alquiler;

class DeudasController extends Controller
{
    public function index(Request $request){
      
        $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        ->get();
        return view('listaDeudas', compact('deudas'));
        
        
    }

    public function store(Request $request){
        $consulta= trim($request-> get('buscador'));
         $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
         ->select('*')
         ->where('alquilerestadopago', '=', false)
         ->where('alquilertipopago','=','Efectivo')
         ->where('clientenombrecompleto','LIKE','%'.$consulta.'%')
         //->where('clienteci','=',$consulta)
         ->get();
         return view('listaDeudas',compact('deudas','consulta'));
    }
}
