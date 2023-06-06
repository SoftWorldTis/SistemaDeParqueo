<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\alquiler;
use App\Models\entradaSalida;
use App\Models\vehiculo;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EntradasController extends Controller
{
    public function __construct()
    {
        //asignacion de permisos
        $this -> middleware('permission: ver-entradas|crear-entradas|editar-entrada|borrar-entrada' , ['only' => ['index']]);
        $this -> middleware('permission: crear-entrada' , ['only' => ['create, store, entrada, buscarEntrada']]);
        $this -> middleware('permission: editar-entrada' , ['only' => ['edit, update']]);
        $this -> middleware('permission: borrar-entrada' , ['only' => ['destroy, borrar']]);
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
                    return back() -> with('Error', 'No existe ninguna entrada marcada para el vehículo');
                }
            }else{
                return back() -> with('Error', 'No existe ningun vehículo con esa placa');
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
        
        return back() -> with('Mensaje', 'Salida marcada');
    }
}
