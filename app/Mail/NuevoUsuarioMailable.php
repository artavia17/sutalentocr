<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoUsuarioMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;

    public $subject = "Bienvenido al administrador de SU TALENTO";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $email, String $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.nuevoUsuario', ['email' => $this->email, 'password' => $this->password]);
    }
}
