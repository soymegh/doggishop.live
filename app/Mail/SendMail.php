<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $textEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($textBody)
    {
        $this->textEmail = $textBody;
    }

    public function build()
    {
        return $this->subject('Contacto desde la web de mascotas')
            ->view('emails.sendemail')
            ->with(['textEmail' => $this->textEmail]);
    }


}