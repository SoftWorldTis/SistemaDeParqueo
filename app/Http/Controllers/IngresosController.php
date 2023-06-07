<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class IngresosController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-caja' , ['only' => ['update , show']]);
        
    }

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
                    $monto = $sumatoria;

                    session(['resultados2' => $resultados2]);
                    session(['monto' => $monto]);
                    session(['seleccionar' => $seleccionar]);
                    session(['parking' => $parking]);
                    return view('ver-ingresos', compact('resultados2', 'monto', 'seleccionar', 'parking'));
    
        }

        public function show(){
            $resultados2 = session('resultados2');
            $monto = session('monto');
            $seleccionar = session('seleccionar');
            $parking = session('parking');
                
              
            $data = compact('resultados2', 'seleccionar', 'parking');
    
            $pdf = Pdf::loadView('ReportesPDF.reporteIngresos', $data);

            return $pdf->stream();
        }


}

