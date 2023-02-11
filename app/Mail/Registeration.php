<?php

namespace App\Mail;

use App\Model\General;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registeration extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email , $code)
    {
        //
        $this->email = $email;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->email;
        $code = $this->code;
        $main_setting = General::where('section' , 'main_setting')->first();
        $email_sent = General::where('section' , 'email_sent');

        return $this->view('mail.code_sent' , compact('email' , 'code' , 'main_setting' , 'email_sent'));

    }
}
