<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class facturaCorreo extends Mailable
{
    use Queueable, SerializesModels;
    public $pdfContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('softworldtis@gmail.com', 'Parqueo UMSS')
        ->subject('Factura - alquiler de parqueo')
        ->view('Emails.facturaCuerpo')
        ->attachData($this->pdfContent, 'factura.pdf', [
            'mime' => 'application/pdf',
        ]);;
    }
}
