<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ictsupport@ictc.go.tz')
            ->subject("Sofcenter Message - ".$this->email_data['subject'])
            ->view('mail.message')
            ->with([
                'name' => $this->email_data['name'],
                'message' => $this->email_data['message'],
                'email' => $this->email_data['email'],
                'subject' => $this->email_data['subject'],
            ]);
    }
}
