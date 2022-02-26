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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
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
            'image'=>'https://i.ibb.co/Kb95WX3/effects-tried-0-photos-added-0-origin-gallery-total-effects-actions-0-remix-data-tools-used-tilt-shi.jpg"'
        ]);
    }
}
