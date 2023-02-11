<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAnnounce extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $announce;
    public function __construct($announce)
    {
        //
        $this->announce = $announce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $announce = $this->announce;
        return $this->view('announcement::mail.mail' , compact('announce'));
    }
}
