<?php

namespace App\Listeners;

use App\Events\StoreModelEvent;
use App\Model\Article;
use App\Model\General;
use App\Model\GeneralItem;
use App\Model\Menu;
use App\Model\MenuItem;
use App\User;
use Carbon\Carbon;
use App\Repositories\Connection\ConnectionRepository;
use App\Model\Plan\Plot;
use App\Model\Shop\Category;

class StoreEventListener
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
     * @param StoreModelEvent $event
     * @return void
     */
    public function handle(StoreModelEvent $event)
    {
        //


        $model = $event->model;

        $object = $event->object;

        $array = $event->array;

        $events = $model->getEvents();
        if (isset($events) && !empty($events)) {
            foreach ($events as $key => $evental) {

                $func = $key;
                if (isset($evental[3])) {
                    $items = $evental[2]::whereIn('id', $array[$key])->get();

                    foreach ($items as $item) {


                        $func2 = $evental[3];
                        $items2 = $item->$func2->pluck('id')->toArray();
                        $object->$func2()->sync($items2);
                        $object->$func()->sync($array[$key]);


                    }

                } else {
                    $object->$func()->sync($array[$key]);
                }

            }
        }
        if (!empty($model->getEventIn())) {
            foreach ($model->getEventIn() as $eventin) {
                event(new $eventin($object));
            }
        }

        if (get_class($object) == Category::class) {
            $subpare = $object->parent;
            if (isset($subpare) && !empty($subpare)) {
                $subpare->update([
                    'subCount' => $subpare->subCount + 1,
                ]);
            }

        }

        if (get_class($object) == Article::class) {



        }
        if (get_class($object) == Menu::class) {
//            $menu = Menu::create([
//                "title" => $object->title,
//                "code" => $object->code,
//                "lang" => "en",
//                "description" => $object->description,
//                "status" => "1",
//                "user_id" => $object->user_id,
//            ]);

        }
        if (get_class($object) == MenuItem::class) {
//
//           $menu_this = Menu::findOrFail($object->menu_id);
//
//           $mervel =  Menu::where('code' , $menu_this->code)->where('lang' , 'en')->first();
//
//
//            $menu = MenuItem::create([
//                "title" => $object->title,
//                "link" => $object->link,
//                "menu_id" => $mervel->id,
//                "lang" => 'en',
//                "description" => $object->description,
//                "place" => $object->place,
//                "parent_id" => $object->parent_id,
//                "icon" => $object->icon,
//                "status" => $object->status,
//                "user_id" => $object->user_id,
//
//            ]);
        }
        if (get_class($object) == GeneralItem::class) {

        }


        if (get_class($object) == Plot::class) {
            $this->plot_storing_staff($object);
        }


    }

    public function plot_storing_staff($plot)
    {
        $plan = $plot->plan;
        $roled_user = $plan->users;

        foreach ($roled_user as $user) {
            $user_id = $user->user_id;
            $finded_user = User::findOrFail($user_id);
            if (isset($finded_user) && !empty($finded_user)) {
                $this->save_usage($finded_user, $plot);
            }
        }

    }

    public function save_usage($user, $plot)
    {
        $user->usages()->create([
            'permission_id' => $plot->permission_id,
            'start_date' => Carbon::now(),
            'usage_count' => 0,
        ]);
    }
}
