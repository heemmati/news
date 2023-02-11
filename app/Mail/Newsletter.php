<?php

namespace App\Mail;

use App\Model\Newspaper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newspaper $newspaper)
    {
        //
        $this->newsletter = $newspaper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $newsletter = $this->newsletter;
        return $this->view('emails.newsletter.newsletter' , compact('newsletter'));
    }
}
