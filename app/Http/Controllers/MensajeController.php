<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mensaje;
use App\Mail\MensajeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this -> middleware('permission: enviar-mensajes' , ['only' => ['create, store']]);
    }

   
    public function create()
    {
        $usuarios = User::all()->where('name', '!=', 'Superadmin');
        return view ('Mensajes.crear', compact('usuarios'));
    }

  
    public function store(Mensaje $request)
    {
        $usuariosSeleccionados = $request->input('usuarios');
        $usuarios = User::whereIn('id', $usuariosSeleccionados)->get();
        foreach($usuarios as $usuario){
            $mail = new MensajeEmail($request->titulo, $request->mensaje);
            Mail::to($usuario->email)->send($mail);
        }
        return back() -> with('Registrado', 'Mensaje enviado');
    }


}
