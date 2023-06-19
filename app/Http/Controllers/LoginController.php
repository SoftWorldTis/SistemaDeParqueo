<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\NotificacionDeudaEvent;

class LoginController extends Controller
{
    
   public function index (){
        return view('login');
    }

    public function login(Request $request) {
        //dd($request);
        
        $request->validate([
            'email_ci' => ['required', 'max:30'],
            'password' => ['required', 'min:8', 'max:20'], 
        ]);
    
        $credentials = [
            'password' => $request->input('password')
        ];
    
        $emailCi = $request->input('email_ci');
        $field = filter_var($emailCi, FILTER_VALIDATE_EMAIL) ? 'email' : 'ci';
        $credentials[$field] = $emailCi;
    
        if (Auth::attempt($credentials)) {
            // Inicio de sesión exitoso
            event(new NotificacionDeudaEvent());
            $request->session()->regenerate();
            return redirect()->intended('/lobby');
        }
    
        // Inicio de sesión fallido
        return redirect()->back()->withErrors(['email_ci' => 'Credenciales inválidas']);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

