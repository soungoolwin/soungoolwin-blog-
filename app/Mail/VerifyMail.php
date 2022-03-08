<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $randomcode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($randomcode)
    {
        $this->randomcode = $randomcode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verify.email', [
            'randomcode'=>$this->randomcode
        ]);
    }
}
