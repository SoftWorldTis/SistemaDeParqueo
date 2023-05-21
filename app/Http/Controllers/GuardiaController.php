<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardiaRequest;
use App\Models\estacionamiento;
use App\Models\guardia;

use Illuminate\Http\Request;

class GuardiaController extends Controller
{
    public function index(Request $request){
      $parqueos = estacionamiento::all();
      // if($request->na){
      //    $search = "";
      //    $parqueos = estacionamiento::where('guardianombre', 'LIKE', $search)->get();
      // }
      return view('registroGuardia', compact('parqueos'));
     }

     public function store(GuardiaRequest $request){  
        $guardia =new guardia(); 
        $guardia -> estacionamiento_estacionamientoid=$request->input('guardiaparqueo') ;
        $guardia -> guardiacorreo= $request->input('guardiacorreo');
        $guardia -> guardianombre= $request->input('guardianombre');
        $guardia -> guardiahoraentrada= $request->input('guardiahoraentrada');
        $guardia -> guardiahorasalida= $request->input('guardiahorasalida');
        $guardia -> guardiaci= $request->input('guardiaci');
        $guardia -> guardiafechanacimiento= $request->input('guardiafechanacimiento');
        $guardia-> save();
        $parqueos = estacionamiento::all();
        //return view('registroGuardia',compact('parqueos'));
        return back() -> with('Registrado', 'Guardia registrado correctamente');
     }

     public function update(Request $request, $idd){

      $guardia = guardia::findOrFail($idd);

      $guardia->estacionamiento_estacionamientoid = $request->guardiaparqueo;
      $guardia->guardiaci = $request->guardiaci;
      $guardia->guardianombre = $request->guardianombre;
      $guardia->guardiahoraentrada = $request->guardiahoraentrada;
      $guardia->guardiahorasalida = $request->guardiahorasalida;
      $guardia->guardiacorreo = $request->guardiacorreo;
      $guardia->guardiafechanacimiento = $request->guardiafechanacimiento;

      $guardia->save();

      return redirect('/lobby/ListaGuardias');
     }


     public function destroy($idd){
      $guardia = guardia::findOrFail($idd);
      $guardia->delete(); 
      return redirect('/lobby/ListaGuardias');
     }

}
