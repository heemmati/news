<?php

namespace App\Listeners;

use App\Events\TicketStoreEvent;
use App\Mail\SendAnnounce;
use App\Mail\TicketRecieved;
use App\Mail\TicketSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TicketStoreListener
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
     * @param  TicketStoreEvent  $event
     * @return void
     */
    public function handle(TicketStoreEvent $event)
    {
        //
        $ticket_item = $event->ticket_item;
        $ticket = $ticket_item->ticket;
        $department = $ticket->department;
//        dd($ticket);
        if ($ticket->from_id == auth()->id()){
            Mail::to($ticket->FromMe->email)->send(new TicketSent($ticket));
            Mail::to($department->email)->send(new TicketRecieved($ticket));
        }
        else{
            Mail::to($ticket->FromMe->email)->send(new TicketSent($ticket , 1));
              }

    }
}
