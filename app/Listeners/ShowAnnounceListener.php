<?php

namespace App\Listeners;

use App\Events\ShowAnnounceEvent;
use App\User;
use Illuminate\Support\Facades\DB;

class ShowAnnounceListener
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
     * @param ShowAnnounceEvent $event
     * @return void
     */
    public function handle(ShowAnnounceEvent $event)
    {
        //

        $object = $event->object;


        $item = DB::table('announcementables')
            ->where('announcement_id', $object->id)
            ->where('announcementable_id', auth()->id())
            ->where('announcementable_type', User::class)->first();

        DB::table('announcementables')
            ->where('id', $item->id)
            ->update(['viewed' => 1]);


    }
}
