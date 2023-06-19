<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\alquiler;
use App\Models\UserRolHistory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
class UsuarioController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission:ver-usuario' , ['only' => ['index, show, buscar']]);
        $this -> middleware('permission:crear-usuario' , ['only' => ['create, store']]);
        $this -> middleware('permission:editar-usuario' , ['only' => ['edit, update, editarusuarios']]);
        $this -> middleware('permission:borrar-usuario' , ['only' => ['destroy, borrar']]);
        $this -> middleware('permission:ver-historial-roles-usuario' , ['only' => ['historial']]);
    }

    public function index()
    {
        //con paginacion
        $usuarios = User::all()->where('name', '!=', 'Superadmin');
        $consulta='';
        //dd($usuarios);
        return view ('Usuarios.index', compact('usuarios','consulta'));
       
    }

    
    public function create()
    {
        $roles = Role::where('name', '!=', 'Superadmin')->get();
        //dd($roles);
        return view ('Usuarios.crear', compact('roles'));
    }

    
    public function store(UsuarioRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $usuario = User::where('ci', $input['ci'])->first();
    
        if ($usuario) {
            if ($usuario->state === 'inactivo') {
                // Control del modelo antes de cambiar el estado a 'activo'
                if ($usuario->isDirty('name')) {
                    $originalName = $usuario->getOriginal('name');
                    $newName = $usuario->getAttribute('name');
    
                    if (User::isDrasticChange($originalName, $newName)) {
                        $errorMessage = "No se permite cambiar drásticamente el nombre de usuario.";
                        return back()->withErrors(['name' => $errorMessage])->withInput();
                    }
                }
    
                // Actualizar los datos del usuario y cambiar el estado a 'activo'
                $usuario->fill($input);
                $usuario->state = 'activo';
                $usuario->save();
                return back()->with('Registrado', 'Usuario registrado correctamente');
            } else {
                // El usuario ya está registrado y activo
                return back()->withErrors(['uss' => 'El campo CI ya fue registrado'])->withInput();
            }
        } else {
            // Crear un nuevo usuario
            $usuario = User::create($input);
            $usuario->assignRole($request->input('roles'));
        $roles = $request->input('roles');
        foreach ($roles as $rol) {
            UserRolHistory::create([
                'userid' => $usuario->id,
                'roleid' => $rol,
                'change' => 'Asignado',
                'updated' => Carbon::now(), 
            ]);
        }
            return back()->with('Registrado', 'Usuario registrado correctamente');
        }
    }

    
    public function show()
    {
        $usuarios = User::all()->where('name', '!=', 'Superadmin');
        $data=compact('usuarios');
        $pdf = Pdf::loadView('Reportes.Usuarios', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteDeudas.pdf');
    }

    
    public function edit($id)
    {
        $usuario= User::find($id);
        if(User::find($id)){
            $roles = Role::where('name', '!=', 'Superadmin')->get();
            $usuarioRol = $usuario->roles->pluck('name', 'name')->all();
            return view('Usuarios.editar', compact('usuario','roles','usuarioRol'));
        }else{
            $usuarios='';
            $consulta='';
            //dd('nos bot aquiiiii');
            return redirect()->route('editarUsuarios');
        }
        
    }

    
    public function update(Request $request, $id)
    {
        $usuario= User::find($id);
        $validatedData = $request->validate([
            'ci' => [
                'required',
                Rule::unique('users')->ignore($usuario->id),
            ],
            'fechanacimiento' => 'required|date|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
        ], [
            'ci.unique' => 'El campo CI ya fue registrado',
            'fechanacimiento.before' => 'Debes ser mayor de 18 años',
        ]);

        //Verificar cambios en password
        $input = $request ->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $usuario= User::find($id);
        $rolesAnteriores= $usuario->roles->pluck('id')->toArray();
        $roles = $request->input('roles');
        foreach ($roles as $rol) {
            UserRolHistory::create([
                'userid' => $usuario->id,
                'roleid' => $rol,
                'change' => 'Asignado',
                'updated' => Carbon::now(), 
            ]);
        }

        $usuario->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        //$usuario->assignRole($request->input('roles'));
        $usuario->syncRoles($request->input('roles'));

        $rolesActuales = $usuario->roles->pluck('id')->toArray();
        $rolesRevocados = array_diff($rolesAnteriores, $rolesActuales);
        //dd($rolesAnteriores, $rolesActuales, $rolesRevocados);
        foreach ($rolesRevocados as $rol) {
            UserRolHistory::create([
                'userid' => $usuario->id,
                'roleid' => $rol,
                'change' => 'Revocado',
                'updated' => Carbon::now(), 
            ]);
        }
        return back() -> with('Registrado', 'Usuario actualizado correctamente');
    }

    
    public function destroy($id)
    {   
        $usuario=User::find($id);
        $usuario -> state= 'inactivo';
        $usuario->save();
        return redirect()->route('borrarUsuario')-> with('Eliminado', 'Usuario eliminado correctamente');
        //dd($usuario->alquileres()->factura()->get());
       
       
       /* if($usuario){
            // Eliminar los vehículos relacionados
            $usuario->vehiculo()->delete();
            // Eliminar los registros relacionados en la tabla "factura"
            $usuario->alquileres()->each(function ($alquiler) {
                $alquiler->factura()->delete();
            });
            // Eliminar los alquileres relacionados
            $usuario->alquileres()->delete();
            // Eliminar los alquileres relacionados
            $usuario->alquileres()->delete();
            // Eliminar el usuario
            $usuario->delete();
            return redirect()->route('borrarUsuario')-> with('Eliminado', 'Usuario eliminado correctamente');
        }else{
            return redirect()->route('borrarUsuario')-> with('Error', 'Algo salio mal');
        }
        */
    }

    public function buscar(Request $request){
        $consulta= trim($request-> get('buscador'));
        //$usuarios = User::where('name','LIKE','%'.$consulta.'%')->where('name', '!=', 'Superadmin')->get();
        $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
        ->where('name', '!=', 'Superadmin')
          ->where('state', 'activo')
        ->get();
        //dd($usuarios);
        return view ('Usuarios.index', compact('usuarios','consulta'));
    }

    public function borrar(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            //$usuarios = User::where('name', 'LIKE', '%' . $consulta . '%')->where('name', '!=', 'Superadmin')->get();
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
            ->where('name', '!=', 'Superadmin')
             ->where('state', 'activo')
            ->get();
        }else{
            $usuarios = '';
        }
        return view ('Usuarios.borrar', compact('usuarios','consulta'));
    }

    public function editarusuarios(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            //$usuarios = User::where('name', 'LIKE', '%' . $consulta . '%')->where('name', '!=', 'Superadmin')->get();
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
            ->where('name', '!=', 'Superadmin')
              ->where('state', 'activo')
            ->get();
        }else{
            $usuarios = '';
        }

        return view ('Usuarios.editarusuarios', compact('usuarios','consulta'));
    }

    public function historial(){
        $historial = UserRolHistory::with('user', 'role')->get();
        $data=compact('historial');
        $pdf = Pdf::loadView('Reportes.historialUsuario', $data);
        return $pdf->stream();
    }
}
