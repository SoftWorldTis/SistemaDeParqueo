<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\alquiler;
use Illuminate\Support\Facades\DB;
use App\Models\factura;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\facturaCorreo;
use Barryvdh\DomPDF\Facade\Pdf;
class DeudaController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-deuda|editar-deuda' , ['only' => ['index, store, show']]);
        $this -> middleware('permission: editar-deuda' , ['only' => ['edit, editardeudas , update']]);
    }
    public function index(){
      
        $deudas= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        ->where('alquilertipopago','=','Efectivo')
        ->get();
        $consulta="";
        return view('Deudas.ver', compact('deudas', 'consulta'));
          
    }
    public function store(Request $request){
        $consulta= trim($request-> get('buscador'));
        $deudas= alquiler::join('users','userid', '=' ,'id')
         ->select('*')
         ->where('alquilerestadopago', '=', false)
         ->where('alquilertipopago','=','Efectivo')
         ->where('name','LIKE','%'.$consulta.'%')
         //->where('clienteci','=',$consulta)
         ->get();
         return view('Deudas.ver',compact('deudas','consulta'));
    }


    public function show(){
        $deudas= alquiler::join('users','userid', '=' ,'id')
        ->select('*')
        ->where('alquilerestadopago', '=', false)
        ->where('alquilertipopago','=','Efectivo')
        ->get();
        $data=compact('deudas');
        $pdf = Pdf::loadView('Reportes.reporteDeudas', $data);
        return $pdf->stream();
        //return $pdf->download('ReporteDeudas.pdf');
    }




    public function edit($id )
    {
        $alquiler = alquiler::find($id);
        $alquiler -> alquilerestadopago= true;
        $alquiler->save();

    
            $factura = new factura();
            $factura -> facturafecha =  Carbon::now()->format('Y-m-d');
            $factura -> alquilerid = $alquiler->alquilerid;
            $factura -> facturatotal =  $alquiler -> alquilerprecio;
            $factura -> save();

            $facturaid= $factura->facturaid;
            $factura = factura::with('alquiler.user', 'alquiler.estacionamiento')->where('facturaid', $facturaid)->first();
    
            $datos=compact('factura');
            $pdf = PDF::loadView('Reportes.factura', $datos);
            $pdfContent = $pdf->output();

            $mail = new facturaCorreo($pdfContent);
            Mail::to($factura->alquiler->user->email)->send($mail);

            return back() -> with('Registrado', 'Deuda pagado correctamente. Factura enviada');

     
        
    }


    public function editardeudas(Request $request){
        //dd($request);
        $consulta= trim($request-> get('buscador'));
        
        if (!empty($consulta)) {
            //$usuarios = User::where('name', 'LIKE', '%' . $consulta . '%')->where('name', '!=', 'Superadmin')->get();
            $deudas= alquiler::join('users','userid', '=' ,'id')
            ->select('*')
            ->where('alquilerestadopago', '=', false)
            ->where('alquilertipopago','=','Efectivo')
            ->where(DB::raw('LOWER(name)'),'LIKE','%'. strtolower($consulta) .'%')
            //->where('clienteci','=',$consulta)
            ->get();
        }else{
            $deudas = '';
        }

        return view ('Deudas.editarDeudas', compact('deudas','consulta'));
    }
}
