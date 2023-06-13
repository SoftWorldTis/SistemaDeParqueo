<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Mail\NotiDeudor;
use Illuminate\Support\Facades\Mail;

class VerificacionDeudores
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        
            //$deudores = DB::table('alquiler')
                //->whereDate('alquilerfecha', '<', Carbon::now()->subWeek())
                //->where('alquilerestadopago', false)
                //->get();
            $deudores = DB::table ('alquiler')
             ->where('alquilerestadopago',false)
             ->get();
             $de2 = (array) $deudores; 
             //dd($de2);
    // Convertir el objeto stdClass a un array asociativo
          if( $de2 != null){
              foreach ($deudores as $deu) {
                  $deu = (array) $deu;    
                  $usuario = DB::table('users')
                  ->whereDate('lastnotification', '<', Carbon::now()->subWeek())
                  ->where('id', $deu['userid']) 
                  ->get();
                  $us = (array) $usuario;
                  if($us != null){
                      //actualizar la ultima notificacion
                      foreach($usuario as $usu){

                          $usu = (array) $usu;
                          DB::table('users')
                          ->where('id', $deu['userid'])
                          ->update(['lastnotification' => Carbon::now()]);
                          Mail::to($usu['email'])->send(new NotiDeudor());
                        }
                    }
                }
            }
       
    }
}
