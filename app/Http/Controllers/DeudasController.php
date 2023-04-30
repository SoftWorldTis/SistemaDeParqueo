<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alquiler;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function show(){
        $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        ->get();
        $data=compact('deudas');
        $pdf = Pdf::loadView('ReportesPDF.reporteDeudas', $data);
        return $pdf->stream();
    
    }
}
