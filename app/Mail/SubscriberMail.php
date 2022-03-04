<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;
    public $bloglanguage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData, $bloglanguage)
    {
        $this->blog = $formData;
        $this->bloglanguage = $bloglanguage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.subscribermailtemp', [
            'blog'=>$this->blog,
            'language'=>$this->bloglanguage
         ]);
    }
}
