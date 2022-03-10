<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * email_data
     * emails data from the controller
     * @var mixed
     */
    public $email_data;

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
            ->subject("SoftCenter email Verification code")
            ->view('mail.verify_email_code')
            ->with([
                'name' => $this->email_data['name'],
                'code' => $this->email_data['code'],
            ]);
    }
}
