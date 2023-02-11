<?php

namespace Modules\Ticket\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Model\Ticket\Department;

class DepartmentController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new Department());
    }
}
