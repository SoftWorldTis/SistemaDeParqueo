<?php

namespace App\Http\Controllers;


use App\Models\estacionamiento;
use App\Models\guardia;
use App\Models\listaCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\cliente;
class ListaGuardiasController extends Controller
{
    public function index(Request $request){
       
        $searchValue = trim($request->get('buscador'));

        $guardias = DB::table('guardia')
            ->select('guardianombre', 'guardiaci', DB::raw("to_char(guardiahoraentrada, 'HH:MI') AS guardiahoraentrada"), DB::raw("to_char(guardiahorasalida, 'HH24:MI') AS guardiahorasalida"), 'guardiacorreo', 'guardiafechanacimiento')
            ->groupBy('guardianombre', 'guardiaci', 'guardiahoraentrada', 'guardiahorasalida', 'guardiacorreo', 'guardiafechanacimiento')
            ->orderBy('guardianombre', 'ASC')
            ->get();
        
        return view('ListaGuardias', compact('guardias', 'searchValue'));
    }


    public function edit($idd){
        $guardia = guardia::where('guardiaci', $idd)->first();
        $parqueos = estacionamiento::all();

        $parqueo_id = $guardia->estacionamiento_estacionamientoid;
        $parqueo_select = estacionamiento::where('estacionamientoid', $parqueo_id)->first();

        return view("EditarGuardia", [
            'guardia' => $guardia,
            'parqueos' => $parqueos,
            'parqueo_select' => $parqueo_select
        ]);
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

    public function store(Request $request){
        //busqueda por nombre
        $searchValue = trim($request->get('buscador'));

        $guardias = DB::table('guardia')
            ->select('guardianombre', 'guardiaci', DB::raw("to_char(guardiahoraentrada, 'HH:MI') AS guardiahoraentrada"), DB::raw("to_char(guardiahorasalida, 'HH24:MI') AS guardiahorasalida"), 'guardiacorreo', 'guardiafechanacimiento')
            ->groupBy('guardianombre', 'guardiaci', 'guardiahoraentrada', 'guardiahorasalida', 'guardiacorreo', 'guardiafechanacimiento')
            ->orderBy('guardianombre', 'ASC')
            ->where('guardianombre', 'LIKE', '%' .$searchValue. '%')
            ->get();

        return view('ListaGuardias', compact('guardias','searchValue'));
    }

    public function eliminarGuardia($guardia)
    {
        $guardiaAEliminar = Cliente::findOrFail($guardia);
        $guardiaAEliminar->delete();
        return response()->json(['success' => true]);
    }
}
