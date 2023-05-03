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
      
        //dd($seleccionado);
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

    public function store(Request $request){
      // dd($request);
       $estacionamiento =DB::table('estacionamiento')
       ->select('estacionamientoid')
       ->where('estacionamientozona', '=', $request->input('parqueo'))
       ->get()
       ->first();

        $alquiler =new alquiler(); 
        $alquiler -> estacionamiento_estacionamientoid=$estacionamiento ->estacionamientoid;
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
        //dd($alquiler);

        $alquiler-> save();
        
        return back() -> with('Registrado', 'Alquiler registrado correctamente');
    }
}
