<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//agregamos modelos de permisos 
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: crear-rol' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-rol' , ['only' => ['edit, update, editarroles']]);
    }
   

  
    public function create()
    {
        $permisos = Permission::get();
        return view('Roles.crear', compact('permisos'));
    }

  
    public function store(Request $request)
    {
        //dd($permisos);
        //Se puede cambiar por un Request
        $this -> validate($request, ['nombrerol'=> 'required|max:15|min:5|unique:Spatie\Permission\Models\Role,name', 'permisos' => 'required'],
        [
            'nombrerol.required' => 'El campo Nombre Rol es requerido.',
            'nombrerol.max' => 'El campo Nombre Rol no puede tener más de  15 carácteres.',
            'nombrerol.min' => 'El campo Nombre Rol debe tener al menos 5 carácteres.',
            'nombrerol.unique' => 'El nombre de rol ya está en uso.',
            'permisos.required' => 'Debe seleccionar al menos un permiso.'
        ]);
        
        $rol= Role::create(['name' => $request->input('nombrerol')]);
        $rol -> syncPermissions($request->input('permisos'));
        //return redirect()->route('Roles.index');
        return back() -> with('Registrado', 'Rol registrado correctamente');
    }
    
   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $rol= Role::find($id);
        if($rol){
            $permisos = Permission::get();
            //$rolPermisos = $rol->permissions()->get();
            $rolPermisos = $rol->permissions()->pluck('name', 'name')->all();
            //dd($rolPermisos);
            return view('Roles.editar', compact('rol','permisos', 'rolPermisos'));
        }else{
            return redirect()->route('editarParqueos');
        }
        
    }
    

   
 
    public function update(Request $request, $id)
    {
        //Se puede cambiar por un Request
        $this -> validate($request, ['nombrerol'=> 'required', 'permisos' => 'required']);
        $rol= Role::find($id);
        $rol -> name = $request->input('nombrerol');
        $rol -> syncPermissions($request->input('permisos'));
        return back() -> with('Registrado', 'Rol actualizado correctamente');

    }

  
    public function destroy($id)
    {
        DB::table('roles')-> where('id', $id) -> delete();
        return redirect()->route('Roles.index');
    }

    public function editarroles(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            //$parqueos = estacionamiento::where('estacionamientozona', 'LIKE', '%' . $consulta . '%')->get();
            $roles =Role::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])->where('name', '!=', 'Superadmin')->get();
        }else{
            $roles = Role::all()->where('name', '!=', 'Superadmin');
        }

        return view ('Roles.editarroles', compact('roles','consulta'));
    }
}
