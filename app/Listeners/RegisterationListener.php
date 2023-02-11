<?php

namespace App\Listeners;

use App\Events\Registeration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegisterationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registeration  $event
     * @return void
     */
    public function handle(Registeration $event)
    {
        //
        $email = $event->email;
        $code = $event->code;
        Mail::to($email)->send(new \App\Mail\Registeration($email , $code));
    }
}
