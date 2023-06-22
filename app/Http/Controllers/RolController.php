<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RolPermissionHistory;
use Illuminate\Http\Request;

//agregamos modelos de permisos 
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: crear-rol' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-rol' , ['only' => ['edit, update, editarroles']]);
        $this -> middleware('permission:ver-historial-permisos-rol' , ['only' => ['show']]);
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
        $permisos = $request->input('permisos');
        foreach ($permisos as $permission) {
            RolPermissionHistory::create([
                'roleid' => $rol->id,
                'permissionid' => $permission,
                'change' => 'Asignado',
                'updated' => Carbon::now(), 
            ]);
        }
        return back() -> with('Registrado', 'Rol registrado correctamente');
    }
    
   
    public function show()
    {
        $historial = RolPermissionHistory::with('role', 'permission')->get();
        $data=compact('historial');
        $pdf = Pdf::loadView('Reportes.Roles', $data);
        return $pdf->stream();
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
        $lastRol= Role::find($id);
        $permisosAnteriores= $lastRol->permissions->pluck('id')->toArray();

        $newPermissions = $request->input('permisos');
        foreach ($newPermissions as $permission) {
            RolPermissionHistory::create([
                'roleid' => $rol->id,
                'permissionid' => $permission,
                'change' => 'Asignado',
                'updated' => Carbon::now(), 
            ]);
        }
        $rol -> name = $request->input('nombrerol');
        $rol -> syncPermissions($request->input('permisos'));

        $permisosActuales = $rol->permissions->pluck('id')->toArray();
        $permisosRevocados = array_diff($permisosAnteriores, $permisosActuales);
        foreach ($permisosRevocados as $permission) {
            RolPermissionHistory::create([
                'roleid' => $rol->id,
                'permissionid' => $permission,
                'change' => 'Revocado',
                'updated' => Carbon::now(), 
            ]);
        }
        
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
