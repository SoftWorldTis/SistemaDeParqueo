<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
   public function index (){
        return view('login');
    }

    public function login(Request $request) {
        //dd($request);

        $request->validate([
            'email'=> ['required','email','max:25'],
            'password'=> ['required','min:8','max:20'], 
        ]);
        
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            // Inicio de sesión exitoso
            $request->session()->regenerate();
            return redirect()->intended('/lobby');
        }

        // Inicio de sesión fallido
        return redirect()->back()->withErrors(['email' => 'Credenciales inválidas']);
        

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

