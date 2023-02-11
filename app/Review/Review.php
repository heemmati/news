<?php


namespace App\Review;


interface Review
{
    public function filter($data);

    public function data($data);
}
