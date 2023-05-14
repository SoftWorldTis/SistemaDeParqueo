<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
   public function index (){
        return view('login');
    }

    public function log(Request $request) {

        $nombre = $request->input('name');
        $contraseña = $request->input('password');
    
        $usuario = DB::table('administrador')
        ->where('administradornombre', $nombre)
        ->first();
        if ($usuario&& Hash::check($contraseña, $usuario->administradorcontraseña) ) {

            $data = [
                'user' => $usuario,
                'rol' => 'admin'
            ];
            return redirect('/lobby')->with('success', '¡Inicio sesion sin problemas!');
        } else {
            dd("pi pi pi ");
        }

/*
        if ($usuario && Hash::check($contraseña, $usuario->administradorcontraseña)) {
        dd("kiri, facilito facilito fififiififi");
        } else {
        dd("pi pi pi ");
        }
        */
    }
}

