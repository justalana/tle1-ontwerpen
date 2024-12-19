<?php

namespace App\Mail;

use AllowDynamicProperties;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Storage;

#[AllowDynamicProperties] class ApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $status;

    /**
     * Create a new message instance.
     */
    public function __construct($application)
    {


        $this->application = $application;

        if ($application->status == 2) {
            $this->status = "Geaccepteerd";
        } else if ($application->status == 3) {
            $this->status = "Geannuleerd";
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vacancy Queued',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            markdown: 'mail.vacancy.email',
            with: ['vacancy' => $this->application->vacancy,
                'status' => $this->status],

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
