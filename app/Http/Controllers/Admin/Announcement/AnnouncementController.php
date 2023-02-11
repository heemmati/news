<?php

namespace App\Http\Controllers\Admin\Announcement;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Model\Announcement\Announcement;

class AnnouncementController extends AdminController
{
    public function __construct()
    {

        parent::__construct(new Announcement());


    }
}
