<?php

namespace App\Http\Controllers\Admin\Bookmark;

use App\Http\Controllers\Admin\MainController;
use Modules\Bookmark\Repository\BookmarkRepository;

class BookmarkController extends MainController
{


    public function __construct()
    {
        $this->repository = new BookmarkRepository();
    }


}
