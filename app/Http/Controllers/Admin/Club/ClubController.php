<?php

namespace App\Http\Controllers\Admin\Club;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Model\Club\Club;

class ClubController extends AdminController
{
    //
    public function __construct()
    {
        parent::__construct(new Club);

    }
}
