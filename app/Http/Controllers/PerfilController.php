<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\alquiler;

class PerfilController extends Controller
{
    public function index($id){
        $usuario = cliente::join('vehiculo', 'cliente_clienteci', '=' ,'clienteci')
        ->select('*')
        ->where('clienteci', '=', $id)
        ->get();
        $alquileres = cliente::join('alquiler', 'cliente_clienteci', '=' ,'clienteci')
        ->join('estacionamiento','estacionamiento_estacionamientoid','=','estacionamientoid')
        ->select('*')
        ->where('clienteci', '=', $id)
        ->get();
        //dd($alquileres);
        return view ('Perfil', compact('usuario','alquileres'));
    }
}
