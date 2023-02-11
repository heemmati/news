<?php


namespace App\Traits;


use App\Model\Position\Position;

trait SiteTrait
{

    public function get_specific()
    {
        $position_specific_news = Position::where('code', 'specific_news')->first();
        if (isset($position_specific_news) && !empty($position_specific_news)) {
            $specific_news = $position_specific_news->articles()->latest()->get()->take($position_specific_news->count);

        } else {
            $specific_news = null;
        }

        return $specific_news;

    }

    public function get_specific_by_article_ids($article_ids)
    {
        $position_specific_news = Position::where('code', 'specific_news')->first();
        if (isset($position_specific_news) && !empty($position_specific_news)) {
            $specific_news = $position_specific_news->articles()->whereIn('articles.id' , $article_ids)->latest()->get()->take($position_specific_news->count);

        } else {
            $specific_news = null;
        }

        return $specific_news;

    }


    public function get_editors()
    {

        $position_editor = Position::where('code', 'editor_choice')->first();
        if (isset($position_editor) && !empty($position_editor)) {
            $publishers = $position_editor->articles()->latest()->get()->take($position_editor->count);

        } else {
            $publishers = null;
        }

        return $publishers;
    }
}
