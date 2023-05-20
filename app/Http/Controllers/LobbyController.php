<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LobbyController extends Controller
{
    public function index (){
        $rol="Cliente"; //aqui viene el dato del login
        $resultado = DB::table('rol_funcionalidad as rf')
                ->join('rol as r', 'r.rolid', '=', 'rf.rf_rolid')
                ->select('rf.rfid', 'rf.rf_funcionalidadid', 'r.rolnombre')
                ->where('r.rolnombre', 'LIKE', '%' .$rol. '%')
                ->get();

         ($resultado);
       // return view('lobby');
      return view('lobby', compact('resultado'));
    }
    
   
}
