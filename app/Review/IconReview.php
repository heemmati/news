<?php


namespace App\Review;


use App\Model\Icon\Icon;
use App\Model\Video\Video;

class IconReview implements Review
{
    protected $data;

    public function data($data)
    {


        $filtered = [
            'title' => $data->get('title'),
            'src' => $data->get('src'),
            'start_date' => $data->get('start_date'),
            'end_date' => $data->get('end_date'),
        ];

        return $filtered;

    }

    public function filter($filtered)
    {

        $result = [];

        $data = $this->data($filtered);


        $result['filter'] = $data;

        $result['icons'] =Icon::latest()
            ->Title($data['title'])
            ->Src($data['src'])
            ->Start($data['start_date'])
            ->End($data['end_date'])
            ->get();


        return $result;
    }
}
