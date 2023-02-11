<?php

namespace App\Listeners;

use App\Events\CreateModelEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PrintListener
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
     * @param  CreateModelEvent  $event
     * @return void
     */
    public function handle(CreateModelEvent $event)
    {
        //

        $model = $event->model;

        if (!empty($model->getEvents())){
            $inputs = $model->getEvents();
            $route_name = $model->getRoute();

            $object = $event->object;

             $parent_id = null;
            $model_name = null;

            \App\Lubricator\ViewController::form_generator_without_model($inputs , $route_name , $object);
        }
    }
}
