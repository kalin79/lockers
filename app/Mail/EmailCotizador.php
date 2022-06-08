<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailCotizador extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    protected $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$template)
    {
        $this->data = $data;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->template === 2){
            $templateView = 'emails.cotizador';
            $address = 'infodev@codegraph.pe';
            $subject = 'Cotizar' .' '. $this->data["nombre"];
            $name = "Lockers";
        }else{
            $templateView = 'emails.contacto';
            $address = 'infodev@codegraph.pe';
            $subject = 'Contáctenos';
            $name = "Lockers";
        }
        return $this->from($address, $name)
                    ->subject($subject)
                    ->view($templateView)
                    ->with([
                        'data' => $this->data
                    ]);
    }
}
