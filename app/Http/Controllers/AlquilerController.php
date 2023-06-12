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
use Illuminate\Support\Facades\Mail;
use App\Mail\pruebaCorreo;
use App\Mail\facturaCorreo;
use Illuminate\Support\Facades\Auth;

class AlquilerController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-alquiler' , ['only' => ['index']]);
        $this -> middleware('permission: crear-alquiler' , ['only' => ['create, store, show']]);
    }

    public function index(Request $request){
    }

    public function create(Request $request){
        $parqueo = estacionamiento::all();
        //$clientes = User::all()->where('name', '!=', 'Superadmin');
        $clientes = User::has('vehiculo')->get();
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
        $clientes = User::has('vehiculo')->get();
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
  
        $alquiler =new alquiler(); 
        $alquiler -> estacionamientoid=$request->input('parqueoid');;
        $alquiler -> alquilerprecio= $request->input('costo');
        $alquiler -> alquilerfecha=  Carbon::now()->format('Y-m-d');
        $alquiler -> alquilertipopago= $request->input('Pago');
        $alquiler -> alquilersitio= $request->input('sitio');
        $alquiler -> alquilerfechaini= $request->input('FechaInicio');
        $alquiler -> alquilerfechafin= $request->input('FechaFin');
        //$alquiler -> cliente_clienteci= $request->input('usuariosdatosci');
        $alquiler -> userid= $request->input('usuarioid');
        if($request->input('Pago') == "Efectivo"){
            $alquiler -> alquilerestadopago= false;
        }else{
            $alquiler -> alquilerestadopago= true;
        }

        $alquiler-> save();

        if($request->input('Pago') == "QR"){
            $factura = new factura();
            $factura -> facturafecha =  Carbon::now()->format('Y-m-d');
            $factura -> alquilerid = $alquiler->alquilerid;
            $factura -> facturatotal =  $alquiler -> alquilerprecio;
            $factura -> save();

            $facturaid= $factura->facturaid;
            $factura = factura::with('alquiler.user', 'alquiler.estacionamiento')->where('facturaid', $facturaid)->first();
    
            $datos=compact('factura');
            $pdf = PDF::loadView('Reportes.factura', $datos);
            $pdfContent = $pdf->output();

            $mail = new facturaCorreo($pdfContent);
            Mail::to($factura->alquiler->user->email)->send($mail);

            return back() -> with('Registrado', 'Alquiler registrado correctamente. Factura enviada');

        }else{
            return back() -> with('Registrado', 'Alquiler registrado correctamente');
        }
        
    }

    public function edit($id){
        $alquiler = alquiler::where('userid', '=', $id)
        -> orderBy('alquilerid','desc')
        ->first();
        
        $parqueo = estacionamiento::where('estacionamientoid', $alquiler ->estacionamientoid)
        ->first();
        $usuario = Auth::user();
        return view('Alquiler.editar', compact('alquiler','parqueo', 'usuario'));

    }

    public function update(AlquilerRequest $request, $id){
        $alquiler =alquiler::find($id);
        
        $alquiler -> estacionamientoid=$request->input('parqueoid');;
        $alquiler -> alquilerprecio= $request->input('costo');
        $alquiler -> alquilerfecha=  Carbon::now()->format('Y-m-d');
        $alquiler -> alquilertipopago= $request->input('Pago');
        $alquiler -> alquilersitio= $request->input('sitio');
        $alquiler -> alquilerfechaini= $request->input('FechaInicio');
        $alquiler -> alquilerfechafin= $request->input('FechaFin');
        $alquiler -> userid= $request->input('usuarioid');
        if($request->input('Pago') == "Efectivo"){
            $alquiler -> alquilerestadopago= false;
        }else{
            $alquiler -> alquilerestadopago= true;
        }
        $alquiler-> save();

        
        if($request->input('Pago') == "QR"){
            $factura = new factura();
            $factura -> facturafecha =  Carbon::now()->format('Y-m-d');
            $factura -> alquilerid = $alquiler->alquilerid;
            $factura -> facturatotal =  $alquiler -> alquilerprecio;
            $factura -> save();

            $facturaid= $factura->facturaid;
            $factura = factura::with('alquiler.user', 'alquiler.estacionamiento')->where('facturaid', $facturaid)->first();
    
            $datos=compact('factura');
            $pdf = PDF::loadView('Reportes.factura', $datos);
            $pdfContent = $pdf->output();

            $mail = new facturaCorreo($pdfContent);
            Mail::to($factura->alquiler->user->email)->send($mail);

            return back() -> with('Registrado', 'Alquiler renovado correctamente. Factura enviada');

        }else{
            return back() -> with('Registrado', 'Alquiler renovado correctamente');
        }
    }

}
