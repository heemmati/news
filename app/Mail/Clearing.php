<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Clearing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $account;
    public $abstract;

    public function __construct($account)
    {
        //
        $this->account = $account;
        $this->abstract = $account->order->abstract;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $account = $this->account;
        $abstract = $this->abstract;

        return $this->view('mail.clearing' , compact('account' , 'abstract'));

    }
}
