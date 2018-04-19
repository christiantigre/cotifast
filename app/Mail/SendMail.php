<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$archivo, $nom_proforma)
    {
         $this->data=$data;
         $this->archivo=$archivo;
         $this->nom_proforma=$nom_proforma;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.proforma')->subject('Proforma.')->attach($this->archivo, [
                        'as' => $this->nom_proforma.'.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
