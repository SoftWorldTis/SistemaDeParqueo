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
use App\Models\User;

class AlquilerController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-alquiler|crear-alquiler|editar-alquiler' , ['only' => ['index']]);
        $this -> middleware('permission: crear-alquiler' , ['only' => ['create, store, show']]);
        $this -> middleware('permission: editar-alquiler' , ['only' => ['edit, update, show']]);
    }

    public function index(Request $request){
    }

    public function create(Request $request){
        $parqueo = estacionamiento::all();
        $clientes = User::all()->where('name', '!=', 'Superadmin');;
        $seleccionado="";
        $seleccionadoes="";
        $valorcl = $request->input('usuariosdatosci');
        session(['valorcl' => $valorcl]);
        $js ="";
        return view('Alquiler.crear', compact('parqueo', 'clientes', 'seleccionado','seleccionadoes','valorcl','js'));

    }

    public function show($id){
        //$seleccionado =  estacionamiento::where('estacionamientoid', $id)
        //->first();
      
        //dd($request);
        $parqueo = estacionamiento::all();
        $clientes = User::all()->where('name', '!=', 'Superadmin');;
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


        return view('Alquiler.crear', compact('parqueo', 'clientes', 'seleccionado' ,'seleccionadoes','valorcl','js'));
    }


    public function store(AlquilerRequest $request){
        $usuario= User::where('ci',$request->input('usuariosdatosci'))->first();
  
        $alquiler =new alquiler(); 
        $alquiler -> estacionamientoid=$request->input('parqueoid');;
        $alquiler -> alquilerprecio= $request->input('costo');
        $alquiler -> alquilerfecha=  Carbon::now()->format('Y-m-d');
        $alquiler -> alquilertipopago= $request->input('Pago');
        $alquiler -> alquilersitio= $request->input('sitio');
        $alquiler -> alquilerfechaini= $request->input('FechaInicio');
        $alquiler -> alquilerfechafin= $request->input('FechaFin');
        //$alquiler -> cliente_clienteci= $request->input('usuariosdatosci');
        $alquiler -> userid= $usuario->id;
        if($request->input('Pago') == "Efectivo"){
            $alquiler -> alquilerestadopago= false;
        }else{
            $alquiler -> alquilerestadopago= true;
        }

        $alquiler-> save();
        return back() -> with('Registrado', 'Alquiler registrado correctamente');
/*
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
        }*/
        
    
    }

    public function edit($id){
        $alquiler = alquiler::where('userid', '=', $id)
        -> orderby('alquilerfecha','desc')
        ->first();
        
        $parqueo = estacionamiento::where('estacionamientoid', $alquiler ->estacionamientoid)
        ->first();

        $usuario = user::fing($id)
        ->get();
        return view('Alquiler.editar', compact('alquiler','parqueo', 'usuario'));

    }

    public function update(AlquilerRequest $request, $id){
        $input = $request ->all();
        $usuario= User::find($id);
        $usuario->update($input);
        return back() -> with('Registrado', 'Alquiler renovado');
    }
}
