<?php


namespace App\Traits;


use Artesaos\SEOTools\Facades\SEOTools;

trait Seo
{
    public function set_seo_tools($title , $description)
    {
        /* Set Seo*/
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
    }
}
