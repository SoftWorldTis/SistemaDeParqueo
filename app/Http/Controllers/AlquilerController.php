<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlquilerRequest;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    public function index(){
        return view('registraralquiler') ;
    }


    public function store(AlquilerRequest $request){
        dd($request);
    }
}
