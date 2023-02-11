<?php


namespace App\Traits;


use App\Utility\Lang;

trait HasTime
{
    public function timeHandler()
    {


            $time = verta($this->created_at);
            return $time->formatDifference();


    }

    public function timePersian($time_input){
        if ( config('app.locale') == Lang::PERSIAN ){
            $time = verta($time_input);
            return $time->formatDifference();
        }
        else{
            return $time_input;
        }
    }


    public function timePersianCreated(){

            $time = verta($this->created_at);
            return $time->formatDate();

    }

}
