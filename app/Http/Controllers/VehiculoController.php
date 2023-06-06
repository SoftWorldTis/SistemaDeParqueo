<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehiculoRequest;
use Illuminate\Http\Request;
use App\Models\vehiculo;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class VehiculoController extends Controller
{
    
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-vehiculos|crear-vehiculos|editar-vehiculos|borrar-vehiculos' , ['only' => ['index']]);
        $this -> middleware('permission: crear-vehiculos' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-vehiculos' , ['only' => ['edit, update']]);
        $this -> middleware('permission: borrar-vehiculos' , ['only' => ['destroy, borrar']]);
    }

    public function index()
    {
        $usuarios = user::has('vehiculo')->get();
        //dd($usuarios);
        $consulta='';
        return view('Vehiculos.index', compact('usuarios', 'consulta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Vehiculos.crear');
    }

    public function store(VehiculoRequest $request)
    {
        $user= User::where('ci',$request->input('ci'))->first();
        $vehiculo =new vehiculo();
        $vehiculo -> vehiculomodelo= $request->input('vehiculomodelo');
        $vehiculo -> vehiculoplaca= $request->input('vehiculoplaca');
        $vehiculo -> vehiculodescripcion= $request->input('vehiculodescripcion');
        $vehiculo -> userid = $user->id;
        $vehiculo-> save();

        return back() -> with('Registrado', 'Vehículo registrado correctamente');
    }

    
    public function show()
    {
        $usuarios = user::has('vehiculo')->get();
        $data=compact('usuarios');
        $pdf = Pdf::loadView('Reportes.Vehiculos', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteVehiculos.pdf');
    }

   
    public function edit($id)
    {
        $vehiculo = vehiculo::with('User')->find($id);
        if(vehiculo::find($id)){
            return view('Vehiculos.editar', compact('vehiculo'));
        }else{
            $usuario='';
            $consulta='';
            return redirect()->route('editarVehiculos');
        }
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'clienteV1' => 'required|unique:App\Models\vehiculo,vehiculoplaca,' . $id,
        ],[
            'clienteV1.unique' => 'El número de placa ya fue resgistrado.', 
        ]);
        $user= User::where('ci',$request->input('ci'))->first();
        $vehiculo = vehiculo::find($id);
        $vehiculo -> vehiculomodelo= $request->input('vehiculomodelo');
        $vehiculo -> vehiculoplaca= $request->input('vehiculoplaca');
        $vehiculo -> vehiculodescripcion= $request->input('vehiculodescripcion');
        $vehiculo -> userid = $user->id;
        $vehiculo-> save();


        return back() -> with('Registrado', 'Vehículo actualizado correctamente');
    }

  
    public function destroy($id)
    {
        $consulta='';
        if(vehiculo::find($id)){
            //descomentar para eliminar
            vehiculo::find($id)->delete();
            return redirect()->route('borrarParqueo')-> with('Eliminado', 'Vehículo eliminado correctamente');
        }else{
            return redirect()->route('borrarParqueo')-> with('Error', 'Algo salio mal');
        }
    }

    public function buscar(Request $request){
        $consulta= trim($request-> get('buscador'));
        $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])->get();
        return view ('Vehiculos.index', compact('usuarios','consulta'));
    }

    public function editarvehiculos(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])->get();
            //dd($usuarios);
        }else{
            $usuarios = '';
        }

        return view ('Vehiculos.editarvehiculos', compact('usuarios','consulta'));
    }

    public function borrar(Request $request){
        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])->get();
        }else{
            $usuarios = '';
        }
        return view ('Vehiculos.borrar', compact('usuarios','consulta'));
    }
}
