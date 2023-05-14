<?php

namespace App\Http\Controllers;


use App\Models\listaCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\cliente;
class ListaGuardiasController extends Controller
{
    public function index(Request $request){
       
        
        $guardias = DB::table('guardia')
            ->select('guardianombre', 'guardiaci', DB::raw("to_char(guardiahoraentrada, 'HH:MI') AS guardiahoraentrada"), DB::raw("to_char(guardiahorasalida, 'HH24:MI') AS guardiahorasalida"), 'guardiacorreo', 'guardiafechanacimiento')
            ->groupBy('guardianombre', 'guardiaci', 'guardiahoraentrada', 'guardiahorasalida', 'guardiacorreo', 'guardiafechanacimiento')
            ->orderBy('guardianombre', 'ASC')
            ->get();
                    return view('listaGuardias', compact('guardias' ));

    }




    
    public function show(){
       
        $guardias = DB::select("SELECT guardianombre, guardiaci, guardiahoraentrada, guardiahorasalida, guardiacorreo, guardiafechanacimiento 
        FROM guardia  
        GROUP BY guardianombre, guardiaci
        ORDER BY guardianombre ASC");
        $data=compact('guardias');
        $pdf = Pdf::loadView('GuardiasRepPDF.ReporteGuardias', $data);
        return $pdf->stream();
    
    }

    public function eliminarGuardia($guardia)
    {
        $guardiaAEliminar = Cliente::findOrFail($guardia);
        $guardiaAEliminar->delete();
        return response()->json(['success' => true]);
    }
}
