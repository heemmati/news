<?php


namespace App\Review\Report;


use App\Review\Report;
use App\Review\Review;

class CollectionReport extends Report
{


    function result(Review $review, $data)
    {

        $result = $this->get_review($review , $data);

        return $result;
    }
}
