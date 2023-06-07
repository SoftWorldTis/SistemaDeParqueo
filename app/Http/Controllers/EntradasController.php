<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\alquiler;
use App\Models\entradaSalida;
use App\Models\vehiculo;
use App\Models\User;
use App\Models\estacionamiento;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class EntradasController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: crear-entradas' , ['only' => ['buscarEntrada, marcarEntrada']]);
        $this -> middleware('permission: crear-salidas' , ['only' => ['buscarSalida, marcarSalida']]);
        $this -> middleware('permission: ver-salidas' , ['only' => ['index, buscar, show']]);
    }

    public function index(Request $request){
        $parqueos = estacionamiento::all();
        $entradas = '';
        return view('EntradaSalida.index', compact('parqueos', 'entradas', 'request'));
    }

    public function buscar(Request $request){
        //dd($request);
        $validatedData = $request->validate([
            'fechainicio' => 'required|date',
            'fechafin' => 'required|date|after_or_equal:fechainicio',
        ],[
            'fechafin.after_or_equal' =>'Fecha fin debe ser mayor a la Fecha inicio'
        ]);

        $fechaini =  Carbon::create($request->input('fechainicio'));
        $fechafin = Carbon::create($request->input('fechafin'));
        //dd($fechafin);
        if($request->input('parqueo') == null){
            //dd('No hay parqueo');
            $entradas = entradaSalida::whereDate('entradatime', '>=', $fechaini->format('Y-m-d'))
            ->whereDate('salidatime', '<=', $fechafin->format('Y-m-d'))
            ->with('alquiler.user', 'alquiler.estacionamiento', 'vehiculo')
            ->get();

        }else{
            $parqueo = $request->input('parqueo');
            $entradas = entradaSalida::whereDate('entradatime', '>=', $fechaini->format('Y-m-d'))
            ->whereDate('salidatime', '<=', $fechafin->format('Y-m-d'))
            ->with('alquiler.user', 'alquiler.estacionamiento', 'vehiculo')
            ->whereHas('alquiler', function ($query) use ($parqueo) {
                $query->where('estacionamientoid', $parqueo);
            })
            ->get();
            //dd($entradas);
        }
        $parqueos=estacionamiento::all();;
        return view('EntradaSalida.index', compact('entradas' , 'parqueos', 'request'));
    }

    public function show(Request $request){

        $fechaini = Carbon::create($request->input('fechainicio'));
        $fechafin = Carbon::create($request->input('fechafin'));

        if($request->input('parqueo') == null){
            //dd('No hay parqueo');
            $entradas = entradaSalida::whereDate('entradatime', '>=', $fechaini->format('Y-m-d'))
            ->whereDate('salidatime', '<=', $fechafin->format('Y-m-d'))
            ->with('alquiler.user', 'alquiler.estacionamiento', 'vehiculo')
            ->get();
        }else{
            $parqueo = $request->input('parqueo');
            $entradas = entradaSalida::whereDate('entradatime', '>=', $fechaini->format('Y-m-d'))
            ->whereDate('salidatime', '<=', $fechafin->format('Y-m-d'))
            ->with('alquiler.user', 'alquiler.estacionamiento', 'vehiculo')
            ->whereHas('alquiler', function ($query) use ($parqueo) {
                $query->where('estacionamientoid', $parqueo);
            })
            ->get();
        }
        $data=compact('entradas', 'request');
        $pdf = Pdf::loadView('Reportes.EntradaSalida', $data);
        return $pdf->stream();
    }

    public function buscarEntrada(Request $request){

        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            $vehiculo = vehiculo::whereRaw('LOWER(vehiculoplaca) = ?', [strtolower($consulta)])->get();
            $fechaActual = new DateTime();
            if(!$vehiculo->isEmpty()){
                $user = User::find($vehiculo[0]->userid);    
                $alquileres = $user->alquileres()->with('estacionamiento', 'user')->get();
                
                $entradas=[];
                foreach ($alquileres as $alquiler) {
                    $fechaInicio = DateTime::createFromFormat('Y-m-d', $alquiler->alquilerfechaini );
                    $fechaFin = DateTime::createFromFormat('Y-m-d', $alquiler->alquilerfechafin);
                    if ($fechaActual >= $fechaInicio && $fechaActual <= $fechaFin){
                        array_push($entradas, $alquiler);
                    }
                }
                if(empty($entradas)){
                    return back() -> with('Error', 'No existe ningún alquiler registrado para hoy');
                }
            }else{
                return back() -> with('Error', 'No existe ningun vehículo con esa placa');
            }
        }else{
            $vehiculo = '';
            $entradas = '';
        }
        return view('EntradaSalida.ver-entradas', compact('consulta', 'vehiculo', 'entradas'));
    }

    
    public function marcarEntrada($alquiler, $vehiculo){
        $zonaHoraria = new DateTimeZone('America/La_Paz');
        $tiempoActual= new DateTime('now', $zonaHoraria);

        $entrada= entradaSalida::where('alquilerid', $alquiler)
        ->whereDate('entradatime', $tiempoActual->format('Y-m-d'))
        ->where('salidatime', null)->get();
        //dd($entrada);
        if($entrada->count() > 0){
            return back() -> with('Error', 'Existe un vehículo en el sitio');
        }else{
            //dd('no hay registros de entradas');
            $zonaHoraria = new DateTimeZone('America/La_Paz');
            $entradaSalida =new entradaSalida();
            $entradaSalida -> entradatime= $tiempoActual;
            $entradaSalida -> vehiculoid= $vehiculo;
            $entradaSalida -> alquilerid= $alquiler;
            $entradaSalida -> save();
        }
        
        return back() -> with('Mensaje', 'Entrada marcada');
    }

    public function buscarSalida(Request $request){
        $consulta= trim($request-> get('buscador'));
        if (!empty($consulta)) {
            $vehiculo = vehiculo::whereRaw('LOWER(vehiculoplaca) = ?', [strtolower($consulta)])->get();
            $fechaActual = new DateTime();
            if(!$vehiculo->isEmpty()){
                $user = User::find($vehiculo[0]->userid);    
                $alquileres = $user->alquileres()->with('estacionamiento', 'user')->get();
                $entradas= entradaSalida::where('vehiculoid', $vehiculo[0]->vehiculoid)
                ->where('salidatime', null)
                ->with('alquiler.user', 'alquiler.estacionamiento', 'vehiculo')
                ->get();
                //dd($entradas);
                if($entradas->count() == 0){
                    $consulta='';
                    $vehiculo='';
                    $entradas='';
                    //return view('EntradaSalida.marcar-salida', compact('consulta', 'vehiculo', 'entradas'))
                    return redirect()->route('salida', compact('consulta', 'vehiculo', 'entradas'))
                    ->with('Error', 'No existe ninguna entrada marcada para el vehículo');
                }
            }else{
                $consulta='';
                $vehiculo='';
                $entradas='';
               // return view('EntradaSalida.marcar-salida', compact('consulta', 'vehiculo', 'entradas'))
                //->with('Error', 'No existe ningun vehículo con esa placa');
                return redirect()->route('salida', compact('consulta', 'vehiculo', 'entradas'))
                ->with('Error', 'No existe ningún vehículo con esa placa');
            }
        }else{
            $vehiculo = '';
            $entradas = '';
        }
        return view('EntradaSalida.marcar-salida', compact('consulta', 'vehiculo', 'entradas'));
    }

    public function marcarSalida($id){
        //dd($id);
        $zonaHoraria = new DateTimeZone('America/La_Paz');
        $tiempoActual= new DateTime('now', $zonaHoraria);

        $entrada= entradaSalida::find($id);
        if($entrada->exists()){
            $zonaHoraria = new DateTimeZone('America/La_Paz');
            $entrada->salidatime= $tiempoActual;
            $entrada->save();
        }
        $consulta='';
        $vehiculo='';
        $entradas='';
        return redirect()->route('salida', compact('consulta', 'vehiculo', 'entradas'))
        ->with('Mensaje', 'Salida Marcada');
    }
}
