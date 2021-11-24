<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailSend, $nombre, $telefono;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nombre, $telefono)
    {
        // 
        $this->nombre = $nombre; 
        $this->telefono = $telefono;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Prueba')->view('correo', [
            'nombre' => $this->nombre,
            'telefono' => $this->telefono
        ]);
        return $this->view('view.name');
    }
}
