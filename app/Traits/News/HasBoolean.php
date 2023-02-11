<?php


namespace App\Traits\News;


use App\Model\News\ArticleBoolean;

trait HasBoolean
{



    public function boolean()
    {

        return $this->hasOne(ArticleBoolean::class, 'article_id');
    }

    public function getShowCommentsAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->comments;
        }
    }


    public function getImageRssAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->image_rss;
        }
    }

    public function getMostCommentsAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->most_comments;
        }
    }


    public function getMostRatedAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->most_rated;
        }
    }

    public function getMostViewedAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->most_viewed;
        }
    }


    public function getViewCountAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->view_count;
        }
    }


    public function getShowSocialAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->social;
        }
    }


    public function getShowIframeAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->iframe;
        }
    }


    public function getShowRssAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->rss;
        }
    }


    public function getShowImageAttribute()
    {
        if (isset($this->boolean) && !empty($this->boolean)) {
            return $this->boolean->image;
        }
    }


}
