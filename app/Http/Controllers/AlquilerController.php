<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cliente;
use Illuminate\Http\Request;
use App\Models\estacionamiento;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlquilerRequest;
use App\Models\alquiler;

class AlquilerController extends Controller
{
    public function index(Request $request){
        $parqueo = estacionamiento::all();
        $clientes = cliente::all();
        $seleccionado="";
        return view('registraralquiler', compact('parqueo', 'clientes', 'seleccionado'));
    }

    public function show($id){
        //$seleccionado =  estacionamiento::where('estacionamientoid', $id)
        //->first();
        $seleccionado = DB::table('estacionamiento')
        ->select('*')
        ->where('estacionamientoid','=',$id)
        ->get()
        ->first();
        //dd($seleccionado);
        $parqueo = estacionamiento::all();
        $clientes = cliente::all();
        return view('registraralquiler', compact('parqueo', 'clientes', 'seleccionado'));
    }

    public function store(AlquilerRequest $request){
        //dd($request);
        $estacionamiento = alquiler::find($request->input('parqueo'))->estacionamientoci;
        dd($request);

        $alquiler =new alquiler(); 
        $alquiler -> estacionamiento_estacionamientoid=$request->input('alquilerparqueo') ;
        $alquiler -> alquilerprecio= $request->input('alquilercorreo');
        $alquiler -> alquilerfecha= $request->input('alquilernombre');
        $alquiler -> alquilertipopago= $request->input('alquilerhoraentrada');
        $alquiler -> alquilerSitio= $request->input('alquilerhorasalida');
        $alquiler -> alquilerFechaIni= $request->input('alquilerci');
        $alquiler -> alquilerFechaFin= $request->input('alquilerci');
        $alquiler -> cliente_clienteci= $request->input('alquilerfechanacimiento');
        $alquiler -> alquilerestadopago= $request->input('alquilerfechanacimiento');
        $alquiler-> save();
        $parqueos = estacionamiento::all();
        //return view('registroGuardia',compact('parqueos'));
        return back() -> with('Registrado', 'Guardia registrado correctamente');
    }
}
