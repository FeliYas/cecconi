<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;

class PresupuestoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $archivo;

    /**
     * Create a new message instance.
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
        $this->archivo = $datos['archivo'] ?? null;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo mensaje de presupuesto',
            from: new Address('no-reply@cecconi.osole.com.ar', ($this->datos['nombre'] ?? '')),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.presupuesto',
            with: [
                'datos' => $this->datos,
            ]
        );
    }
    
    public function attachments(): array
    {
        $archivos = [];

        if ($this->archivo && $this->archivo instanceof \Illuminate\Http\UploadedFile) {
            $archivos[] = \Illuminate\Mail\Mailables\Attachment::fromPath(
                $this->archivo->getRealPath()
            )->as($this->archivo->getClientOriginalName())
            ->withMime($this->archivo->getMimeType());
        }

        return $archivos;
    }

}
