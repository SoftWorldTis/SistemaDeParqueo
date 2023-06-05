<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\alquiler;
use App\Models\factura;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
class PagoController extends Controller
{
    public function index(){
      
        $pagos= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', true)
        ->get();
        $consulta="";
        return view('Pagos.ver', compact('pagos', 'consulta'));
          
    }
    public function store(Request $request){
        $consulta= trim($request-> get('buscador'));
        $pagos= alquiler::join('users','userid', '=' ,'id')
         ->select('*')
         ->where('alquilerestadopago', '=', true)
         ->where('name','LIKE','%'.$consulta.'%')
         //->where('clienteci','=',$consulta)
         ->get();
         return view('Pagos.ver',compact('pagos','consulta'));
    }


    public function show(){
        $pagos= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', true)
        
        ->get();
        $data=compact('pagos');
        $pdf = Pdf::loadView('ReportesPDF.reportePagos', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteDeudas.pdf');
    }




    public function edit($id)
    {
        $pagos= Alquiler::find($id);
        if(Alquiler::find($id)){
             //consulta donde redigira
            return view('Pagos.editar', compact('pagos','consulta'));
        }else{
            $usuarios='';
            $consulta='';
            //dd('nos bot aquiiiii');
            return redirect()->route('editarPagos');
        }
        
    }


    public function editarpagos(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            //$usuarios = User::where('name', 'LIKE', '%' . $consulta . '%')->where('name', '!=', 'Superadmin')->get();
            $pagos= alquiler::join('users','userid', '=' ,'id')
            ->select('*')
            ->where('alquilerestadopago', '=', true)
            ->where('name','LIKE','%'.$consulta.'%')
            //->where('clienteci','=',$consulta)
            ->get();
        }else{
            $pagos = '';
        }

        return view ('Pagos.editarPagos', compact('pagos','consulta'));
    }
}
