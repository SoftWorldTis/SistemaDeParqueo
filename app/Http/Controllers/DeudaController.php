<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\alquiler;
use App\Models\factura;
use Illuminate\Http\Request;
use App\Models\User;
class DeudaController extends Controller
{


    public function index(){
      
        $deudas= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        ->get();
        $consulta="";
        return view('Deudas.ver', compact('deudas', 'consulta'));
          
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
         return view('Deudas.ver',compact('deudas','consulta'));
    }
}
