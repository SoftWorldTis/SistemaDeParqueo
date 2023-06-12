<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\alquiler;
use App\Models\factura;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
class PagoController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
     
        $this -> middleware('permission:  ver-pagos' , ['only' => ['index, store, show']]);

    }

    public function index(){
      
        $pagos= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', true)
        ->get();
        $consulta="";
        return view('Pagos.ver', compact('pagos', 'consulta'));
          
    }
   
    public function store(Request $request){
        $consulta= trim($request-> get('buscador'));
        $pagos= alquiler::join('users','userid', '=' ,'id')
         ->select('*')
         ->where('alquilerestadopago', '=', true)
       
         ->where('name','LIKE','%'.$consulta.'%')
         //->where('clienteci','=',$consulta)
         ->get();
         return view('Pagos.ver',compact('pagos','consulta'));
    }

    public function show(){
        $pagos= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=',true)
        
        ->get();
        $data=compact('pagos');
        $pdf = Pdf::loadView('Reportes.reportePagos', $data);
        return $pdf->stream();
        //return $pdf->download('ReportePagos.pdf');
    }
}
