<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParqueoRequest;
use Illuminate\Http\Request;
use App\Models\estacionamiento;
use Barryvdh\DomPDF\Facade\Pdf;

class ParqueoController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-parqueo' , ['only' => ['index, show, buscar']]);
        $this -> middleware('permission: crear-parqueo' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-parqueo' , ['only' => ['edit, update, editarparqueos']]);
        $this -> middleware('permission: borrar-parqueo' , ['only' => ['destroy, borrar']]);
    }

    public function index()
    {
        //con paginacion
        $parqueos = estacionamiento::all();
        $consulta='';
        return view ('Parqueos.index', compact('parqueos','consulta'));
       
    }

    
    public function create()
    {
        return view ('Parqueos.crear');
    }

    
    public function store(ParqueoRequest $request)
    {
        if ($request->hasFile('estacionamientoimagen')) {
            $archivo = $request->file('estacionamientoimagen');
            if ($archivo->isValid()) {
                $imageName = time().'.'.$request->estacionamientoimagen->extension();  
                $pathImg= $request->estacionamientoimagen->move(public_path('img'), $imageName);

                $estacionamiento =new estacionamiento();
                $estacionamiento -> estacionamientocorreo= $request->input('estacionamientocorreo');
                $estacionamiento -> estacionamientozona= $request->input('estacionamientozona');
                $estacionamiento -> estacionamientoprecio= $request->input('estacionamientoprecio');
                $estacionamiento -> estacionamientoestado= 'activo';
                $estacionamiento -> estacionamientohorainicio= $request->input('estacionamientohoraInicio');
                $estacionamiento -> estacionamientohoracierre= $request->input('estacionamientohoraCierre');
                $estacionamiento -> estacionamientotelefono= $request->input('estacionamientotelefono');
                $estacionamiento -> estacionamientositios= $request->input('estacionamientositios');
                $estacionamiento -> estacionamientoimagen= $imageName;

                $estacionamiento -> save();
                return back() -> with('Registrado', 'Parqueo registrado correctamente');

            }
        }else{
          return back() -> with('Mal', 'Algo salió mal');
        }
    }

    
    public function show()
    {
        $parqueos = estacionamiento::all();
        $data=compact('parqueos');
        $pdf = Pdf::loadView('Reportes.Parqueos', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteDeudas.pdf');
    }

    
    public function edit($id)
    {
        $parqueo= estacionamiento::find($id);
        if(estacionamiento::find($id)){
            return view('Parqueos.editar', compact('parqueo'));
        }else{
            $parqueo='';
            $consulta='';
            return redirect()->route('editarParqueos');
        }
        
    }

    
    public function update(Request $request, $id)
    {  
        //dd($request);
        $parqueo= estacionamiento::find($id);
        $parqueo -> estacionamientocorreo= $request->input('estacionamientocorreo');
        $parqueo -> estacionamientozona= $request->input('estacionamientozona');
        $parqueo -> estacionamientoprecio= $request->input('estacionamientoprecio');
        $parqueo -> estacionamientoestado= 'activo';
        $parqueo -> estacionamientohorainicio= $request->input('estacionamientohoraInicio');
        $parqueo -> estacionamientohoracierre= $request->input('estacionamientohoraCierre');
        $parqueo -> estacionamientotelefono= $request->input('estacionamientotelefono');
        $parqueo -> estacionamientositios= $request->input('estacionamientositios');
        
        $archivo = $request->file('estacionamientoimagen');
        if ($archivo!=null) {
            $imageName = time().'.'.$request->estacionamientoimagen->extension();  
            $pathImg= $request->estacionamientoimagen->move(public_path('img'), $imageName);
            $parqueo -> estacionamientoimagen= $imageName;
        }
        $parqueo -> save();
        return back() -> with('Registrado', 'Parqueo actualizado correctamente');
    }

    
    public function destroy($id)
    {   
        $parqueo=estacionamiento::find($id);
        if($parqueo){
            //Eliminar todas las relaciones de entradas y salidas
            $parqueo->alquileres()->each(function ($alquiler) {
                $alquiler->entradaSalida()->delete();
            });
            //Eliminar todas las relaciones de alquiler 
            $parqueo->alquileres()->each(function ($alquiler) {
                $alquiler->factura()->delete();
            });
            // Eliminar los alquileres relacionados
            $parqueo->alquileres()->delete();
            //Eliminar Parqueo
            $parqueo->delete();
            return redirect()->route('borrarParqueo')-> with('Eliminado', 'Parqueo eliminado correctamente');
        }else{
            return redirect()->route('borrarParqueo')-> with('Error', 'Algo salio mal');
        }
        
    }

    public function buscar(Request $request){
        $consulta= trim($request-> get('buscador'));
        //$parqueos = estacionamiento::where('estacionamientozona','LIKE','%'.$consulta.'%')->get();
        $parqueos = estacionamiento::whereRaw('LOWER(estacionamientozona) LIKE ?', ['%' . strtolower($consulta) . '%'])->get();
        return view ('Parqueos.index', compact('parqueos','consulta'));
    }

    public function borrar(Request $request){
        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            //$parqueos = estacionamiento::where('estacionamientozona', 'LIKE', '%' . $consulta . '%')->get();
            $parqueos = estacionamiento::whereRaw('LOWER(estacionamientozona) LIKE ?', ['%' . strtolower($consulta) . '%'])->get();
        }else{
            $parqueos = '';
        }
        return view ('Parqueos.borrar', compact('parqueos','consulta'));
    }

    public function editarparqueos(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            //$parqueos = estacionamiento::where('estacionamientozona', 'LIKE', '%' . $consulta . '%')->get();
            $parqueos = estacionamiento::whereRaw('LOWER(estacionamientozona) LIKE ?', ['%' . strtolower($consulta) . '%'])->get();
        }else{
            $parqueos = '';
        }

        return view ('Parqueos.editarparqueos', compact('parqueos','consulta'));
    }
}
