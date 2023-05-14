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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = cliente::findOrFail($id)->first();
        $vehiculos = vehiculo::where('cliente_clienteci', '=', $id)->get();
        $alquileres = DB::table('alquiler as al')
            ->join('estacionamiento as es', 'es.estacionamientoid', '=', 'al.estacionamiento_estacionamientoid')
            ->select('al.alquilerfecha', 'es.estacionamientozona', 'al.alquilerSitio', 'al.alquilerprecio', 'al.alquilerestadopago')
            ->where('cliente_clienteci', '=', $id)
            ->get();


        return view('Perfil', [
            'cliente' =>  $cliente,
            'vehiculos' => $vehiculos,
            'alquileres' => $alquileres
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
