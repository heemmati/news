<?php


namespace App\Review;


use App\Corel\Factories;

class ReviewFactory implements Factories
{

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function go()
    {

    }
}
