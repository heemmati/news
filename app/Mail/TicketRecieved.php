<?php

namespace App\Mail;

use App\Model\General;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketRecieved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ticket;
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ticket = $this->ticket;
        $main_setting = General::where('section' , 'main_setting')->first();
        $email_sent = General::where('section' , 'email_sent')->first();
        return $this->view('ticket::mail.recieved' , compact('ticket' , 'main_setting' , 'email_sent'));
    }
}
