<?php

namespace App\Mail;

use App\Model\General;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketSent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ticket;
    public $reply;
    public function __construct($ticket , $reply = 0)
    {
        //
        $this->ticket = $ticket;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ticket = $this->ticket;
        $reply = $this->reply;
        $main_setting = General::where('section' , 'main_setting')->first();
        $email_sent = General::where('section' , 'email_sent')->first();

        return $this->view('ticket::mail.sent' , compact('ticket' , 'reply' , 'main_setting' , 'email_sent'));
    }
}
