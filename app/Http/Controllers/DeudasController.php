<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\alquiler;
use App\Models\factura;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
class DeudasController extends Controller
{
    public function index(){
      
        $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        ->get();
        $consulta="";
        return view('listaDeudas', compact('deudas', 'consulta'));
        
        
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

    public function show($id){
        if ($id == "imprimir"){
            $deudas= alquiler::join('cliente','cliente_clienteci', '=' ,'clienteci')
            ->select('*')
            ->where('alquilerestadopago', '=', false)
            ->get();
            $data=compact('deudas');
            $pdf = Pdf::loadView('ReportesPDF.reporteDeudas', $data);
            return $pdf->stream();
            //return $pdf->download('ReporteDeudas.pdf');
        }else{
           
            $alquiler = alquiler::find($id);
            $alquiler -> alquilerestadopago= true;
            $alquiler->save();

            $factura = new factura();
            $factura -> facturafecha =  Carbon::now()->format('Y-m-d');
            $factura -> facturacliente = $alquiler-> cliente_clienteci;
            $factura -> facturaalquiler =  $alquiler-> alquilerid;
            $factura -> facturacargo =  $alquiler -> alquilerprecio;
            $factura -> save();

            $datosFactura= factura::join('cliente','facturacliente', '=' ,'clienteci')
            ->join('alquiler','facturaalquiler','=','alquilerid')
            ->join('estacionamiento','estacionamiento_estacionamientoid','=','estacionamientoid')
            ->select("estacionamientozona","estacionamientotelefono", "clientenombrecompleto", 
            "facturafecha", "facturacargo", "alquilerSitio","alquilerFechaIni", "alquilerFechaFin", "facturaid")
            ->where('alquilerid', '=', $alquiler->alquilerid)
            ->get();
                
            $data=compact('datosFactura');
            $pdf = Pdf::loadView('ReportesPDF.factura', $data);
            return $pdf->stream(); 
            //return $pdf->download('FacturaParqueo.pdf');
        }   
     return redirect()->action([DeudasController::class, 'index']);    
    }
}
