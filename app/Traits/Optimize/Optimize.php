<?php


namespace App\Traits\Optimize;


use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

trait Optimize
{


    public function page_seo($title , $description , $url = null , $canonical = null , $type = null , $twitter_account = null, $image = null )
    {
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);

        if (isset($url) && !empty($url)){
            SEOTools::opengraph()->setUrl($url);
        }
        else{
            SEOTools::opengraph()->setUrl(URL::current());
        }


        if (isset($canonical) && !empty($canonical)){
            SEOTools::setCanonical($canonical);
        }
        else{
            SEOTools::setCanonical(URL::current());
        }



        if (isset($type) && !empty($type)){
            SEOTools::opengraph()->addProperty('type', $type);
        }
        if (isset($twitter_account) && !empty($twitter_account)) {
            SEOTools::twitter()->setSite($twitter_account);
        }
        if (isset($image) && !empty($image)) {
            SEOTools::jsonLd()->addImage(Storage::url($image->src));
        }

    }
}
