<?php

namespace App\Http\Controllers;


use App\Models\listaCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\cliente;
class ListaClientesController extends Controller
{
    public function index(Request $request){
       
        $searchValue = trim($request-> get('buscador'));
        $clientes = DB::table('cliente as c')
    ->select('c.clientenombrecompleto', 'c.clientesis', 'c.clienteci','c.clientefechanac',
        DB::raw('MAX(CASE WHEN row_num = 1 THEN v.vehiculoplaca END) AS vehiculo1'),
        DB::raw('MAX(CASE WHEN row_num = 2 THEN v.vehiculoplaca END) AS vehiculo2'),
        DB::raw('MAX(CASE WHEN row_num = 3 THEN v.vehiculoplaca END) AS vehiculo3')
    )
    ->join(DB::raw('(SELECT cliente_clienteci, vehiculoplaca,
            ROW_NUMBER() OVER(PARTITION BY cliente_clienteci ORDER BY vehiculoplaca) AS row_num
            FROM vehiculo
        ) as v'), 'c.clienteci', '=', 'v.cliente_clienteci')
    ->groupBy('c.clienteci', 'c.clientesis', 'c.clientenombrecompleto')
    ->get();
                    return view('listaClientes', compact('clientes' , 'searchValue' ));

    }

    public function store(Request $request){
      //busqueda por nombre
      $searchValue = trim($request-> get('buscador'));

      $clientes = DB::table('cliente as c')
    ->select('c.clientenombrecompleto', 'c.clientesis', 'c.clienteci','c.clientefechanac',
        DB::raw('MAX(CASE WHEN row_num = 1 THEN v.vehiculoplaca END) AS vehiculo1'),
        DB::raw('MAX(CASE WHEN row_num = 2 THEN v.vehiculoplaca END) AS vehiculo2'),
        DB::raw('MAX(CASE WHEN row_num = 3 THEN v.vehiculoplaca END) AS vehiculo3')
    )
    ->join(DB::raw('(SELECT cliente_clienteci, vehiculoplaca,
            ROW_NUMBER() OVER(PARTITION BY cliente_clienteci ORDER BY vehiculoplaca) AS row_num
            FROM vehiculo
        ) as v'), 'c.clienteci', '=', 'v.cliente_clienteci')
    ->where('c.clientenombrecompleto', 'LIKE', '%' .$searchValue. '%')
    ->groupBy('c.clienteci', 'c.clientesis')
    ->get();
      return view('listaClientes', compact('clientes','searchValue'));
    }




    
    public function show(){
        $clientes = DB::table('cliente as c')
        ->select('c.clientenombrecompleto', 'c.clientesis', 'c.clienteci','c.clientefechanac',
            DB::raw('MAX(CASE WHEN row_num = 1 THEN v.vehiculoplaca END) AS vehiculo1'),
            DB::raw('MAX(CASE WHEN row_num = 2 THEN v.vehiculoplaca END) AS vehiculo2'),
            DB::raw('MAX(CASE WHEN row_num = 3 THEN v.vehiculoplaca END) AS vehiculo3')
        )
        ->join(DB::raw('(SELECT cliente_clienteci, vehiculoplaca,
                ROW_NUMBER() OVER(PARTITION BY cliente_clienteci ORDER BY vehiculoplaca) AS row_num
                FROM vehiculo
            ) as v'), 'c.clienteci', '=', 'v.cliente_clienteci')
        ->groupBy('c.clienteci', 'c.clientesis', 'c.clientenombrecompleto')
        ->get();
        $data=compact('clientes');
        $pdf = Pdf::loadView('ClientesRepPDF.ReporteClientes', $data);
        return $pdf->stream();
    
    }


    public function destroy($idd){
            $factura=DB::table('factura')
            ->where('facturacliente', $idd);
            $factura->delete();
            $alquiler=DB::table('alquiler')
            ->where('cliente_clienteci', $idd);
            $alquiler->delete();
            $vehiculo=DB::table('vehiculo')
            ->where('cliente_clienteci', $idd);
            $vehiculo->delete();
            $cliente= Cliente::findOrFail($idd);
            $cliente-> delete();
            return redirect()->route('lobby.vercliente');

    }
}
