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
        $this -> middleware('permission: ver-vehiculos' , ['only' => ['index, show, buscar']]);
        $this -> middleware('permission: crear-vehiculos' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-vehiculos' , ['only' => ['edit, update, editarvehiculos']]);
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
        $user = User::where('ci', $request->input('ci'))->first();
        $vehiculo = Vehiculo::where('vehiculoplaca', $request->input('vehiculoplaca'))->first();
    
        if ($vehiculo) {
            if ($vehiculo->vehiculoestado == "activo") {
                return back()->withErrors(['vehiculo' => 'El número de placa ya fue resgistrado'])->withInput();
            }
            else {
                $vehiculo->vehiculomodelo = $request->input('vehiculomodelo');
                $vehiculo->vehiculodescripcion = $request->input('vehiculodescripcion');
                $vehiculo->userid = $user->id;
                $vehiculo->vehiculoestado = "activo";
                $vehiculo->save();
    
                return back()->with('Registrado', 'Vehículo registrado correctamente');
            }
        } else {
            $vehiculo = new Vehiculo();
            $vehiculo->vehiculomodelo = $request->input('vehiculomodelo');
            $vehiculo->vehiculoplaca = $request->input('vehiculoplaca');
            $vehiculo->vehiculodescripcion = $request->input('vehiculodescripcion');
            $vehiculo->userid = $user->id;
            $vehiculo->vehiculoestado = "activo";
            $vehiculo->save();
    
            return back()->with('Registrado', 'Vehículo registrado correctamente');
        }
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
            'clienteV1' => [
                'required',
                function ($attribute, $value, $fail) use ($id) {
                    $vehiculoo = Vehiculo::where('vehiculoplaca', $value)->first();
                    
                    if ($vehiculoo) {
                        if ($vehiculoo->vehiculoestado == 'inactivo') {
                            $vehiculoo->vehiculoestado = 'activo';
                            $vehiculoo->save();
                        } else {
                            $fail('El número de placa ya fue registrado');
                        }
                    }
                }
            ],
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

  
    public function destroy(Request $request,$id)
    {
        $user= User::where('ci',$request->input('ci'))->first();
        $vehiculo = vehiculo::find($id);
        $vehiculo -> vehiculoestado = "inactivo";
        $vehiculo-> save();
        return redirect()->route('borrarParqueo')-> with('Eliminado', 'Vehículo eliminado correctamente');
       /* $consulta='';
        $vehiculo = vehiculo::find($id);
        if($vehiculo){
            //descomentar para eliminar
            $vehiculo->delete();
            return redirect()->route('borrarParqueo')-> with('Eliminado', 'Vehículo eliminado correctamente');
        }else{
            return redirect()->route('borrarParqueo')-> with('Error', 'Algo salio mal');
        }*/
    }

    public function buscar(Request $request){
        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
                ->whereHas('vehiculo', function ($query) {
                    $query->where('vehiculoestado', 'activo');
                })
                ->with(['vehiculo' => function ($query) {
                    $query->where('vehiculoestado', 'activo');
                }])
                ->get();
        } else {
            $usuarios = '';
        }
         return view ('Vehiculos.index', compact('usuarios','consulta'));
    }

    public function editarvehiculos(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
                ->whereHas('vehiculo', function ($query) {
                    $query->where('vehiculoestado', 'activo');
                })
                ->with(['vehiculo' => function ($query) {
                    $query->where('vehiculoestado', 'activo');
                }])
                ->get();
        } else {
            $usuarios = '';
        }

        return view ('Vehiculos.editarvehiculos', compact('usuarios','consulta'));
    }

    public function borrar(Request $request)
{
    $consulta = trim($request->get('buscador'));
    
    if (!empty($consulta)) {
        $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
            ->whereHas('vehiculo', function ($query) {
                $query->where('vehiculoestado', 'activo');
            })
            ->with(['vehiculo' => function ($query) {
                $query->where('vehiculoestado', 'activo');
            }])
            ->get();
    } else {
        $usuarios = '';
    }

    return view('Vehiculos.borrar', compact('usuarios', 'consulta'));
}
}
