<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CustomMail extends Mailable
{
    public $subject;
    public $messageContent;

    public function __construct($subject, $messageContent)
    {
        $this->subject = $subject;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->markdown('emails.mail')
                    ->with(['content' => $this->messageContent]);
    }
}

