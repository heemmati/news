<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Model\Plan\Plot;

class PlotController extends AdminController
{
    public function __construct()
    {

        parent::__construct(new Plot());


    }
}
