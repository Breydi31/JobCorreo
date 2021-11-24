<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmail as SendEmail;
use Mail;

class correoMensual implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $emailSend, $nombre, $telefono;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailSend, $nombre, $telefono)
    {
        //
        $this->emailSend = $emailSend; 
        $this->nombre = $nombre; 
        $this->telefono = $telefono;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendEmail($this->nombre, $this->telefono);
        Mail::to($this->emailSend)->queue($email);
    }
}
