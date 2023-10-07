<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FileSubmissionNotificationTask extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    public function build(){
        return $this->view('emails.file_submition_task')
                    ->subject('New File Submission')
                    ->with($this->data);
    }
}
