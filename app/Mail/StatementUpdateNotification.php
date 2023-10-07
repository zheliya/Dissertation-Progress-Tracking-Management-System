<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatementUpdateNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function build()
    {
        return $this->view('emails.student_statement_update')
                    ->subject('Student Statement Update')
                    ->with($this->data);
    }

}

