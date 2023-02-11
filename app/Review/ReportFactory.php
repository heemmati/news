<?php


namespace App\Review;


use App\Corel\Factories;
use App\Review\Report\CollectionReport;

class ReportFactory implements Factories
{

    private $type;

    public function __construct($type = ReportType::COLLECTION)
    {
        $this->type = $type;
    }

    public function go()
    {
        if (isset($this->type) && !empty($this->type)) {
            switch ($this->type) {
                case ($this->type == ReportType::COLLECTION):
                    return new CollectionReport();
                default:
                    return new CollectionReport();
            }
        } else {
            return new CollectionReport();
        }
    }
}
