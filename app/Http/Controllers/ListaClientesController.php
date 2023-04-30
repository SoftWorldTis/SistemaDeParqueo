<?php

namespace App\Http\Controllers;


use App\Models\listaCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaClientesController extends Controller
{
    public function index(Request $request){


        $clientes = DB::select("
                    SELECT c.clientenombrecompleto,  c.clientesis, c.clienteci,
                    MAX(CASE WHEN row_num = 1 THEN v.vehiculoplaca END) AS vehiculo1,
                    MAX(CASE WHEN row_num = 2 THEN v.vehiculoplaca END) AS vehiculo2,
                    MAX(CASE WHEN row_num = 3 THEN v.vehiculoplaca END) AS vehiculo3
                    FROM cliente c
                    JOIN (
                    SELECT cliente_clienteci, vehiculoplaca,
                    ROW_NUMBER() OVER(PARTITION BY cliente_clienteci ORDER BY vehiculoplaca) AS row_num
                    FROM vehiculo
                    ) v
                    ON c.clienteci = v.cliente_clienteci
                    GROUP BY c.clienteci, c.clientesis;
                    ");
    




                    return view('listaClientes')->with('clientes',$clientes);

      /*  $cliente = DB::table('cliente')
        ->join('vehiculo' ,'vehiculo.cliente_clienteci' ,'=','cliente.clienteci')
        ->select('cliente.*')
        ->where('vehiculo.cliente_clienteci', '=' , '')
        ->orderBy('cliente.clienteci','DESC')
        ->get();

       

        return view('listaClientes')->with('cliente',$cliente);*/
    
    
        }
}
