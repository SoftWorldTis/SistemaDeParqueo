<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AlquilerRequest;
use Illuminate\Support\Facades\DB;

class AlquilerController extends Controller
{
    public function index(Request $req){
        if($req-> Sitio){
            //dd($req);
            $parqueos =  DB::select('Select * From estacionamiento where estacionamientoid=6');
            return view('registraralquiler',compact('parqueos'));

        }else{ 
            $parqueos = 0;
            return view('registraralquiler',compact('parqueos'));
        } 
    }

    public function create(){
        return view('registraralquiler');
    }
    

    public function store(AlquilerRequest $request){
       dd("esn esto");
        
    }

    public function estacionamientoid(Request $id){
        return $id;
        //dd($id);
        //return view('registraralquiler, compact('id')')
        //$estacionamiento = DB::select('Select * From estacionamiento where estacionamientoid={{$id}}');
        //return $estacionamiento;
    }
}
