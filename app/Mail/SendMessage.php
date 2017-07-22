<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Message;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $subject = [];
        $subject[] = '[Mejta.net]';
        
        if($this->message->name) {
            $subject[] = 'from ' . $this->message->name;
        }

        $subject[] = $this->message->created_at->format('d. m. Y H:i:s');

        return $this
            ->replyTo($this->message->email, $this->message->name)
            ->subject(join(' ', $subject))
            ->markdown('emails.message');
    }
}
