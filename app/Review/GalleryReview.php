<?php


namespace App\Review;


use App\View\Components\Form\Filemanager\Icon;
use App\Model\Gallery\Gallery;

class GalleryReview implements Review
{
    protected $data;
    public function data($data)
    {


        $filtered = [
            'title' => $data->get('title'),
            'entitle' => $data->get('entitle'),
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

        $result['galleries'] = Gallery::latest()
            ->Title($data['title'])
            ->Entitle($data['entitle'])
           ->Start($data['start_date'])
            ->End($data['end_date'])
            ->get();


        return $result;
    }
}
