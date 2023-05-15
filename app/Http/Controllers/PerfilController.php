<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\alquiler;
use App\Models\cliente;
use App\Models\vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $cliente = cliente::where('clienteci', '=', $id)->first();
        $vehiculos = vehiculo::where('cliente_clienteci', '=', $id)->get();
        $alquileres = DB::table('alquiler as al')
            ->join('estacionamiento as es', 'es.estacionamientoid', '=', 'al.estacionamiento_estacionamientoid')
            ->select('al.alquilerid', 'al.alquilerfecha', 'es.estacionamientozona', 'al.alquilerSitio', 'al.alquilerprecio', 'al.alquilerestadopago')
            ->where('cliente_clienteci', '=', $id)
            ->get();


        return view('Perfil', [
            'cliente' =>  $cliente,
            'vehiculos' => $vehiculos,
            'alquileres' => $alquileres
        ]);
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
