<?php

namespace App\Listeners;

use App\Events\UpdateModelEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateModelListener
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
     * @param  UpdateModelEvent  $event
     * @return void
     */
    public function handle(UpdateModelEvent $event)
    {
        //
        $model = $event->model;
        $object = $event->object;
        $array = $event->array;

        $events = $model->getEvents();
        if (isset($events) && !empty($events)){
            foreach ($events as $key => $event) {

                $func = $key;

                $object->$func()->sync($array[$key]);
            }
        }


    }
}
