<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alquiler;
use Barryvdh\DomPDF\Facade\Pdf;

class PagosController extends Controller
{
    public function index(){
        $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
        ->select('*')
        ->where('alquilerestadopago', '=', true)
        ->get();
        $consulta="";
        return view('listaPagos', compact('deudas', 'consulta'));
    }

    public function store(Request $request){
        $consulta= trim($request-> get('buscador'));
         $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
         ->select('*')
         ->where('alquilerestadopago', '=', true)
         ->where('clientenombrecompleto','LIKE','%'.$consulta.'%')
         //->where('clienteci','=',$consulta)
         ->get();
         return view('listaPagos',compact('deudas','consulta'));
    }

    public function show($id){
        $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
        ->select('*')
        ->where('alquilerestadopago', '=', true)
        ->get();
        $data=compact('deudas');
        $pdf = Pdf::loadView('ReportesPDF.reportePagos', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteDeudas.pdf');
    }

}
