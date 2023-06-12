<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensajeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $titulo;
    public $contenido;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $contenido)
    {
        $this->titulo = $titulo;
        $this->contenido = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('softworldtis@gmail.com', 'Parqueo UMSS')
        ->subject($this->titulo)
        ->view('Emails.mensajes');
    }
}
