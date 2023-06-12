<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\reclamo;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class ReclamosController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-reclamos' , ['only' => ['index, show']]);
        $this -> middleware('permission: crear-reclamos' , ['only' => ['create, store']]);
        
    }
     public function create()
    {
      
        return view('Reclamos.crear');
    
    
    }
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            //dd($user);
           

            
                $reclamo =new reclamo();
                $reclamo -> reclamodescripcion= $request->input('reclamodescripcion');
                $reclamo->reclamofecha = Carbon::now();
                $reclamo -> reclamotitulo= $request->input('reclamotitulo');
                $reclamo -> userid= $user->id;
               
                $reclamo -> save();    

            //dd($alquileres);
            return back() -> with('Registrado', '}Reclamo registrado correctamente');
        } else {
            dd('Algo salio mal');
        }
        
        
        
    }

    public function index()
    {
        $user = Auth::user();
    $reclamos = Reclamo::with('usuario')->get();
    return view('Reclamos.ver', compact('reclamos'));
    }

    public function show()
    {
       
        //return $pdf->download('ReporteVehiculos.pdf');
    }
   
}
