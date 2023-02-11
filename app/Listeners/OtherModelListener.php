<?php

namespace App\Listeners;

use App\Events\ShowModelEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OtherModelListener
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
     * @param  ShowModelEvent  $event
     * @return void
     */
    public function handle(ShowModelEvent $event)
    {
        //
//        $model = $event->model;
//        $id = $event->id;
//        $object = $model::findOrFail($id);
//        $view = $model->getShow();
//        if (isset($view) && !empty($view)){
//            dd($view[0]);
//            return view($view[0] , compact('object'));
//        }



    }
}
