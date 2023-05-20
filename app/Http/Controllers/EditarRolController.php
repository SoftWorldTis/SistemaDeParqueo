<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rol_funcionalidad;
use Illuminate\Support\Facades\DB;
class EditarRolController extends Controller
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
                $rol_func->vehiculos()->delete();
                $rol_func->rf_rolid = '2'; // Reemplaza por el valor adecuado
                $rol_func->rf_funcionalidadid = $opcion['funcionalidadId'];
                $rol_func->save();
            }
        }
    
        return redirect()->route('lobby.inicio');
    }

     
    


}
