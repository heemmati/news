<?php


namespace App\Payam;


interface Payam
{



    public function success($message = null, $callback = null);

    public function error($message = null, $callback = null);

    public function custom();

}
