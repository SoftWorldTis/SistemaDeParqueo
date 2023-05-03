<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cliente;
use Illuminate\Http\Request;
use App\Models\estacionamiento;
use Illuminate\Support\Facades\DB;

class AlquilerController extends Controller
{
    public function index(Request $request){
        $parqueo = estacionamiento::all();
        $clientes = cliente::all();
        $seleccionado="";
        return view('registraralquiler', compact('parqueo', 'clientes', 'seleccionado'));
    }

    public function show($id){
        //$seleccionado =  estacionamiento::where('estacionamientoid', $id)
        //->first();
        $seleccionado = DB::table('estacionamiento')
        ->select('*')
        ->where('estacionamientoid','=',$id)
        ->get()
        ->first();
        //dd($seleccionado);
        $parqueo = estacionamiento::all();
        $clientes = cliente::all();
        return view('registraralquiler', compact('parqueo', 'clientes', 'seleccionado'));
    }

    public function store(Request $request){
        dd($request);
    }
}
