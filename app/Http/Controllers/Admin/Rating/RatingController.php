<?php

namespace Modules\Rating\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rating\Repository\RatingRepository;

class RatingController extends MainController
{

    public function __construct()
    {
        $this->repository = new RatingRepository();
    }


}
