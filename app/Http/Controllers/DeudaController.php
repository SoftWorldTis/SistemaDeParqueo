<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\alquiler;
use App\Models\factura;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $deudas= alquiler::join('users','userid', '=' ,'id')
         ->select('*')
         ->where('alquilerestadopago', '=', false)
         ->where('alquilertipopago','=','Efectivo')
         ->where('name','LIKE','%'.$consulta.'%')
         //->where('clienteci','=',$consulta)
         ->get();
         return view('Deudas.ver',compact('deudas','consulta'));
    }

    public function show(){
        $deudas= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        
        ->get();
        $data=compact('deudas');
        $pdf = Pdf::loadView('ReportesPDF.reporteDeudas', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteDeudas.pdf');
    }
}
