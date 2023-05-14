<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class registrarAdministradorController extends Controller
{
    
   public function index (){
        return view('registrarAdmin');
    }
    
   public function store (Request $request){

        $request->validate([
            'name'=> ['required','email','max:100','unique:administrador,administradornombre'],
            'password'=> ['required','min:8','max:25'], 
        ]);
        $nombre = $request->input('name');
        $contraseña = $request->input('password');
        $password = Hash::make($contraseña);
        DB::table('administrador')->insert([
            'administradornombre' => $nombre,
            'administradorcontraseña' => $password]);
     
      return redirect('/login')->with('success', '¡Usuario registrado correctamente!');
        
   
    
   }

}

