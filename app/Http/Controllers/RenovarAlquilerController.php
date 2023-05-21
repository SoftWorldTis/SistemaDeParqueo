<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\alquiler;
use App\Models\estacionamiento;

class RenovarAlquilerController extends Controller
{
    public function index($id){
        $alquiler = alquiler::where('cliente_clienteci', '=', $id)
        -> orderby('alquilerfecha','desc')
        ->first();
        
        $parqueo = estacionamiento::where('estacionamientoid', $alquiler -> estacionamiento_estacionamientoid)
        ->first();

        $cliente = cliente::where('clienteci', $id)
        ->get();
    }
}
