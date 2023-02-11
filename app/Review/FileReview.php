<?php


namespace App\Review;


use App\Model\File\File;
use App\Model\Video\Video;

class FileReview implements Review
{
    protected $data;

    public function data($data)
    {


        $filtered = [
            'title' => $data->get('title'),
            'entitle' => $data->get('entitle'),
            'alt' => $data->get('alt'),
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

        $result['files'] = File::latest()
            ->Title($data['title'])
            ->Entitle($data['entitle'])
            ->Alt($data['alt'])
            ->Start($data['start_date'])
            ->End($data['end_date'])
            ->get();


        return $result;
    }
}
