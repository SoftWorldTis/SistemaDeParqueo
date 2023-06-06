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
class UsuarioController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-usuario|crear-usuario|editar-usuario|borrar-usuario' , ['only' => ['index']]);
        $this -> middleware('permission: crear-usuario' , ['only' => ['create, store']]);
        $this -> middleware('permission: editar-usuario' , ['only' => ['edit, update']]);
        $this -> middleware('permission: borrar-usuario' , ['only' => ['destroy, borrar']]);
    }

    public function index()
    {
        //con paginacion
        $usuarios = User::paginate(5)->where('name', '!=', 'Superadmin');
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
        //dd($request);
        $input = $request ->all();
        $input['password'] = Hash::make($input['password']);
        $usuario = User::create($input);
        $usuario->assignRole($request->input('roles'));
        return back() -> with('Registrado', 'Usuario registrado correctamente');
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
            'ci' => 'required|unique:App\Models\User,ci,' . $usuario->ci,
        ],[
            'ci.unique' => 'El campo CI ya fue registrado', 
        ]);
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
        return back() -> with('Registrado', 'Usuario actualizado correctamente');
    }

    
    public function destroy($id)
    {   //dd($id);
        $consulta='';
        $usuarios='';
        if(User::find($id)){
            //descomentar para eliminar
            //User::find($id)->delete();
            return redirect()->route('borrarUsuario')-> with('Eliminado', 'Usuario eliminado correctamente');
        }else{
            return redirect()->route('borrarUsuario')-> with('Error', 'Algo salio mal');
        }
        
    }

    public function buscar(Request $request){
        $consulta= trim($request-> get('buscador'));
        //$usuarios = User::where('name','LIKE','%'.$consulta.'%')->where('name', '!=', 'Superadmin')->get();
        $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
        ->where('name', '!=', 'Superadmin')->get();
        //dd($usuarios);
        return view ('Usuarios.index', compact('usuarios','consulta'));
    }

    public function borrar(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            //$usuarios = User::where('name', 'LIKE', '%' . $consulta . '%')->where('name', '!=', 'Superadmin')->get();
            $usuarios = User::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($consulta) . '%'])
            ->where('name', '!=', 'Superadmin')->get();
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
            ->where('name', '!=', 'Superadmin')->get();
        }else{
            $usuarios = '';
        }

        return view ('Usuarios.editarusuarios', compact('usuarios','consulta'));
    }
}
