<?php

namespace App\Listeners;

use App\Events\PlanCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PlanCreateListener
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
     * @param  PlanCreate  $event
     * @return void
     */
    public function handle(PlanCreate $event)
    {
        //
    }
}
