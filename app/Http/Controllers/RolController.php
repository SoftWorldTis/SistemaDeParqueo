<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\rol_funcionalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RolController extends Controller
{
    public function index (){

        
        return view('registrarRol');
    }


    public function store(Request $request)
    {

               //aqui se crea el rol de momento hare todo en admin :3


        $opciones = [
            ['input' => 'crearRol', 'funcionalidadId' => 1],
            ['input' => 'editRol', 'funcionalidadId' => 2],
            // Agrega más opciones según sea necesario
        ];
    
        foreach ($opciones as $opcion) {
            $opcionSeleccionada = $request->input($opcion['input']);
    
            if ($opcionSeleccionada) {
                $rol_func = new rol_funcionalidad();
                $rol_func->rf_rolid = '2'; // Reemplaza por el valor adecuado
                $rol_func->rf_funcionalidadid = $opcion['funcionalidadId'];
                $rol_func->save();
            }
        }
    
        return redirect()->route('lobby.inicio');
    }





    public function opciones (){
        $rol="Administrador"; //aqui viene el dato del login
        $resultado = DB::table('rol_funcionalidad as rf')
                ->join('rol as r', 'r.rolid', '=', 'rf.rf_rolid')
                ->select('rf.rfid', 'rf.rf_funcionalidadid', 'r.rolnombre')
                ->where('r.rolnombre', 'LIKE', '%' .$rol. '%')
                ->get();

         ($resultado);
       // return view('lobby');
      return view('RolOpciones', compact('resultado'));
    
    }


}
