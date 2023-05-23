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
        $this -> middleware('permission: ver-rol|crear-rol|editar-rol|borrar-rol' , ['only' => ['index']]);
        $this -> middleware('permission: crear-rol' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-rol' , ['only' => ['edit, update']]);
        $this -> middleware('permission: borrar-rol' , ['only' => ['destroy']]);
    }
   
    public function index()
    {
        $roles = Role::paginate();
        return view ('Roles.index', compact('roles'));
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
        $this -> validate($request, ['nombrerol'=> 'required|max:15|min:5|unique:Spatie\Permission\Models\Role,name', 'permisos' => 'required']);
        
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
        $permisos = Permission::get();
        $rolesPermisos = DB::table('roles_has_permission')->where('roles_has_permission.role_id',$id)
        -> pluck('roles_has_permission.permission_id','roles_has_permission.permission_id')
        -> all();
        dd($rolesPermisos);
        return view('Roles.editar', compact('rol','permisos', 'rolesPermisos'));
    }
    

   
 
    public function update(Request $request, $id)
    {
        //Se puede cambiar por un Request
        $this -> validate($request, ['nombrerol'=> 'required', 'permisos' => 'required']);
        $rol= Role::find($id);
        $rol -> name = $request->input('nombrerol');
        $rol -> syncPermission($request->input('permisos'));
        return redirect()->route('Roles.index');

    }

  
    public function destroy($id)
    {
        DB::table('roles')-> where('id', $id) -> delete();
        return redirect()->route('Roles.index');
    }
}
