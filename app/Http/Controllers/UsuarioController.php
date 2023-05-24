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

class UsuarioController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-usuario|crear-usuario|editar-usuario|borrar-usuario' , ['only' => ['index']]);
        $this -> middleware('permission: crear-usuario' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-usuario' , ['only' => ['edit, update']]);
        $this -> middleware('permission: borrar-usuario' , ['only' => ['destroy']]);
    }

    public function index()
    {
        //con paginacion
        $usuarios = User::paginate(5);
        //dd($usuarios);
        return view ('Usuarios.index', compact('usuarios'));
    }

    
    public function create()
    {
        $roles = Role::where('name', '!=', 'Superadmin')->get();
        //dd($roles);
        return view ('Usuarios.crear', compact('roles'));
    }

    
    public function store(UsuarioRequest $request)
    {
        //dd($request);
        $input = $request ->all();
        $input['password'] = Hash::make($input['password']);
        $usuario = User::create($input);
        $usuario->assignRole($request->input('roles'));
        return back() -> with('Registrado', 'Usuario registrado correctamente');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $usuario= User::find($id);
        $roles = Role::pluck('name','name') -> all();
        $usuarioRol = $usuario->roles->plunck('name', 'name')->all();
        return view('Usuarios.editar', compact('usuario','roles','usuarioRol'));
    }

    
    public function update(Request $request, $id)
    {
        //Agregar validaciones
        //Verificar cambios en password
        $input = $request ->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }
        $usuario= User::find($id);
        $usuario->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $usuario->assignRole($request->input('roles'));
        return redirect()->route('Usuarios.index');
    }

    
    public function destroy($id)
    {
        User::find($id);
        return redirect()->route('Usuarios.index');
    }
}
