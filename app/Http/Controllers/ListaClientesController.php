<?php

namespace App\Http\Controllers;


use App\Models\listaCliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListaClientesController extends Controller
{
    public function index(Request $request){
        
        return view('listaClientes');
    
    
        }
}
