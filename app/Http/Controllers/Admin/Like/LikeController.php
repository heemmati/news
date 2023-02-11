<?php

namespace App\Http\Controllers\Admin\Like;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repositories\Like\LikeRepository;


class LikeController extends MainController
{


    public function __construct()
    {
        $this->repository = new LikeRepository();
    }


}
