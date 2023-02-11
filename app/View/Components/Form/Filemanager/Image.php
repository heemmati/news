<?php

namespace App\View\Components\Form\Filemanager;

use App\View\Components\Attachment;
use Illuminate\View\Component;

class Image extends Attachment
{

    public function render()
    {
        return view('components.form.filemanager.image');
    }
}
