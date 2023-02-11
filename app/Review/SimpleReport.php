<?php


namespace App\Review;


use Illuminate\Http\Request;

trait SimpleReport
{
    public function get_report(Review $review)
    {
        $report = new ReportFactory();
        $result = $report->go()->get_review($review, Request::capture());

        return $result;
    }
}
