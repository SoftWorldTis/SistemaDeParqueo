<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class IngresosController extends Controller
{
 
       public function update (Request $request) {
        $sumatoria =0;
        $seleccionar = DB::table('estacionamiento')
        ->select('estacionamientozona')
        ->get();
        $fechaInicio = Carbon::parse($request->input('FechaInicio'));
        $fechaFin = Carbon::parse($request->input('FechaFin'));
        $parking = $request->input('parqueo');
        $numero=0;
      
         
            

                $se = DB::table('estacionamiento')
                ->select('estacionamientoid')
                ->where('estacionamientozona', '=', $parking)
                ->get()
                ->first();
              
                if ($se) {
                    $numero = $se->estacionamientoid;   
                } 
        
              $resultados = DB::table('alquiler')
                  ->whereBetween('alquilerfecha', [$fechaInicio, $fechaFin])
                  ->where('estacionamientoid', "=", $numero)
                  ->get();
                 
            
                  $resultados2 = $resultados->filter( function ($item) {
                      return $item->alquilerestadopago === true;
                    });
                    
                    foreach ($resultados2 as $iteracion) {
                        $valor = $iteracion->alquilerprecio;
                        $sumatoria = $sumatoria + $valor;
                    }
          
            
                
         return view('ver-ingresos')->with('resultados2',$resultados2)->with('monto', $sumatoria) ->with('seleccionar',$seleccionar)->with('parking',$parking);
    
        }
}
 /*
        if ($request->filled('FechaInicio')&& $request -> filled ('FechaFin')) {

            $fechaInicio = Carbon::parse($request->input('FechaInicio'));
            $fechaFin = Carbon::parse($request->input('FechaFin'));
        
            $resultados = DB::table('alquiler')
            ->whereBetween('alquilerfecha', [$fechaInicio, $fechaFin])
            ->get();
       
            return view('ver-ingresos', ['resultados' => $resultados]);
        } else {
            // El input está vacío
            // Realiza las acciones necesarias
        }
          */ 