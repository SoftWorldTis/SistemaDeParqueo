<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FuncionalidadController extends Controller
{
    public function index(Request $request){

        return view('registroFuncionalidad');
        }

    }
