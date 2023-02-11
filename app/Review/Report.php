<?php


namespace App\Review;


abstract class Report
{



    public function get_review(Review $review, $data)
    {

        $result = $review->filter($data);
        return $result;
    }

    abstract function result(Review $review, $data);


}
