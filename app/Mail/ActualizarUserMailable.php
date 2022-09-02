<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActualizarUserMailable extends Mailable
{
    use Queueable, SerializesModels;

    // protected $password;

    public $subject = "Actualizar usuario de SU TALENTO CR";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $email, String $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.actualizadoUsuario', ['email' => $this->email, 'token' => $this->token]);
    }
}
