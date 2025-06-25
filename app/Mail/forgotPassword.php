<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class forgotPassword extends Mailable
{
    // Variables públicas que estarán disponibles en la vista del correo

    use Queueable, SerializesModels;


    public $emailUser, $token;
    /**
     * Constructor de la clase.
     * Se le pasa el correo del usuario y el token para recuperar la contraseña.
     */

    public function __construct($emailUser,$token)
    {
        $this->emailUser = $emailUser;
        $this->token = $token;
    }
    /**
     * Construcción del correo.
     * Define la vista Blade que se utilizará, el asunto y los datos que se enviarán a la vista.
     */
    public function build()
    {
        return $this->view('Mails.forgotPassword')
        ->subject('Recuperar contraseña')
        ->with(['emailUser' => $this->emailUser],['token' => $this->token]);

    }


}
