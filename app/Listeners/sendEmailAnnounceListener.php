<?php

namespace App\Listeners;

use App\Events\sendEmailAnnounce;
use App\Mail\SendAnnounce;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendEmailAnnounceListener
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
     * @param  sendEmailAnnounce  $event
     * @return void
     */
    public function handle(sendEmailAnnounce $event)
    {
        //
      $announce = $event->object;

      foreach ($announce->users as $user){

              if ($user->email){
                  Mail::to($user->email)->send(new SendAnnounce($announce));
              }


          }
      }


}
