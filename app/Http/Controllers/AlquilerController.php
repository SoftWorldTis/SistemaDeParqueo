<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cliente;
use Illuminate\Http\Request;
use App\Models\estacionamiento;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlquilerRequest;
use App\Models\alquiler;
use Illuminate\Support\Carbon;
use App\Models\factura;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

class AlquilerController extends Controller
{
    public function index(Request $request){
        $parqueo = estacionamiento::all();
        $clientes = cliente::all();
        $seleccionado="";
        $seleccionadoes="";
        $valorcl = $request->input('usuariosdatosci');
        session(['valorcl' => $valorcl]);
        $js ="";
        return view('registraralquiler', compact('parqueo', 'clientes', 'seleccionado','seleccionadoes','valorcl','js'));
    }

    public function show(Request $request,$id){
        //$seleccionado =  estacionamiento::where('estacionamientoid', $id)
        //->first();
      
        //dd($request);
        $parqueo = estacionamiento::all();
        $clientes = cliente::all();
        $seleccionado = DB::table('estacionamiento')
        ->select('*')
        ->where('estacionamientoid','=',$id)
        ->get()
        ->first();

        // Escribir el archivo JS
        $js = "window.onload= function() {
            document.getElementById('miEmergente').style.display = 'none';
            document.getElementById('mostrarEmergente').style.display = 'none';
            document.getElementById('oculto').style.display='block';
        }";
    
      

        $valorcl = session('valorcl');
        $seleccionadoes =$seleccionado->estacionamientozona;


        return view('registraralquiler', compact('parqueo', 'clientes', 'seleccionado' ,'seleccionadoes','valorcl','js'));
    }

    public function store(AlquilerRequest $request){
      //dd($request);
      

        $alquiler =new alquiler(); 
        $alquiler -> estacionamiento_estacionamientoid=$request->input('parqueoid');;
        $alquiler -> alquilerprecio= $request->input('costo');
        $alquiler -> alquilerfecha=  Carbon::now()->format('Y-m-d');
        $alquiler -> alquilertipopago= $request->input('Pago');
        $alquiler -> alquilerSitio= $request->input('sitio');
        $alquiler -> alquilerFechaIni= $request->input('FechaInicio');
        $alquiler -> alquilerFechaFin= $request->input('FechaFin');
        $alquiler -> cliente_clienteci= $request->input('usuariosdatosci');
        if($request->input('Pago') == "Efectivo"){
            $alquiler -> alquilerestadopago= false;
        }else{
            $alquiler -> alquilerestadopago= true;
            
        }

        $alquiler-> save();

        $id = $alquiler->alquilerid;
        if($request->input('Pago') == "QR"){
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
            session()->flash('Registrado', 'Alquiler registrado correctamente con PDF');         
            return $pdf->stream();
            //return $pdf->download('ReporteDeudas.pdf');


        }else{
            return back() -> with('Registrado', 'Alquiler registrado correctamente');
        }
        
    
    }

    public function factura($alquiler){
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
        //return $pdf->stream(); 
    }

    public function edit(){

    }
}
