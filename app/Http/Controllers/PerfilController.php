<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\alquiler;
use App\Models\cliente;
use App\Models\vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
class PerfilController extends Controller
{
   

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function update(Request $request, $id)
    {
        //dd(User::find($id));
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
       
        $input = $request ->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }
       
        $usuario->update($input);
        return back() -> with('Registrado', 'Datos actualizados correctamente');
    }

    public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();
            //dd($user);
            $vehiculos = vehiculo::where('userid', '=', $user->id)->get();
            $alquileres = DB::table('alquiler as al')
                ->join('estacionamiento as es', 'es.estacionamientoid', '=', 'al.estacionamientoid')
                ->select('al.alquilerid', 'al.alquilerfecha', 'es.estacionamientozona', 'al.alquilersitio', 'al.alquilerprecio', 'al.alquilerestadopago')
                ->where('userid', '=', $user->id)
                ->get();

            //dd($alquileres);
            return view('Perfil.ver', [
                'usuario' =>  $user,
                'vehiculos' => $vehiculos,
                'alquileres' => $alquileres
            ]);
        } else {
            dd('Algo salio mal');
        }
        
        
        
    }



    public function edit()
    {
        if (Auth::check()) {
            $usuario= Auth::user();
            $roles = Role::where('name', '!=', 'Superadmin')->get();;
            $usuarioRol = $usuario->roles->pluck('name', 'name')->all();
            return view('Perfil.editar', compact('usuario','roles','usuarioRol'));
           
        }
        
    }




    public function destroy($id)
    {
        //
    }
}
