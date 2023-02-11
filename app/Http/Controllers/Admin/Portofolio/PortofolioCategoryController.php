<?php

namespace Modules\Portofolio\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Studio\CategoryStudio;
use App\Model\Portofolio\Portofolio;

class PortofolioCategoryController extends CategoryStudio
{

    protected  $model ;

    public function __construct()
    {
        $this->model = Portofolio::class;
    }

}
