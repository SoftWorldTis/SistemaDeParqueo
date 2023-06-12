<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotiDeudor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from('cespedes10aleydahesse@gmail.com', 'Servicio al cliente')
                ->subject('Tienes un deuda pendiente en nuestro sistema de parqueo')
                ->view('NotificacionDeuda');
    }
}
