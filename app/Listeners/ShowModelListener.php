<?php

namespace App\Listeners;

use App\Events\ShowAnnounceEvent;

use App\Events\ShowModelEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Model\Announcement\Announcement;

class ShowModelListener
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
     * @param  ShowModelListener  $event
     * @return void
     */
    public function handle(ShowModelEvent $event)
    {
        //
        $object = $event->object;
        if (get_class($object) == Announcement::class){
            event(new ShowAnnounceEvent($object));
        }

    }
}
