<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $abstract;

    public function __construct($user , $abstract)
    {
        //
        $this->user = $user;
        $this->abstract = $abstract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $abstract = $this->abstract;
        return $this->view('shop::mail.reminder' , compact('user' , 'abstract'));
    }
}
