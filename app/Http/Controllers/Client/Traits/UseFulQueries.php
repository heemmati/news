<?php

namespace App\Http\Controllers\Client\Traits;

use App\Model\News\Article;
use App\Model\News\ArticleDetail;
use Illuminate\Support\Facades\Cache;
use App\Model\Position\Position;

trait UseFulQueries
{


    /* Latest News */
    public function latestNews($take = 40 , $type = 'text')
    {
        return Cache::remember('latests', 70, function () use ($take , $type) {
            return Article::Select('id', 'status', 'head_title', 'type' , 'created_at', 'updated_at')
                ->take($take)->orderBy('articles.updated_at', 'DESC')
                ->whereHas('typef' , function ($fetpe) use($type){
                    $fetpe->where('code' , $type);
                })
                ->where('status', 1)
                ->with(['base' => function ($query) {
                    $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image', 'slug', 'description');
                }])
                ->get();
        });
    }

    /* Get a base object Comment */
    public function getObjectComments($object)
    {
        return Cache::remember('comments' . '_' . $object->id, 3600, function () use ($object) {
            return $object->comments()->where('parent_id', 0)->where('status', 1)->get();
        });
    }

    /* Most visited news */
    public function mostViewedNews($take = 40 , $type = 'text')
    {

        return Cache::remember('mviews', 600, function () use ($take , $type) {
            return ArticleDetail::select('article_id', 'view_count')->orderBy('view_count', 'DESC')
                ->whereHas('article' , function ($query) use($type) {
                    $query->select('articles.id', 'articles.status' , 'articles.type')
                        ->whereHas('typef' , function ($fetpe) use($type){
                            $fetpe->where('code' , $type);
                        })
                        ->where('status', 1)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image', 'slug', 'description');
                        }]);
                })->take($take)->get();
        });
    }

    /* Increment View Count And Return View Count*/
    public function incrementAndReturnView($object)
    {
        $adetail = $object->details;

        $adetail->update([
            'view_count' => $adetail->view_count + 1
        ]);
        $adetail->save();

        return $adetail->view_count;

    }

    /* Get An Object All Categories Ids*/
    public function getAllCategoriesIds($article)
    {
        return Cache::remember('category_ids' . '_' . $article->id, 36000, function () use ($article) {
            return $article->categories()->select('categories.id')->get()->pluck('id')->toArray();
        });
    }


    /* Get An Object All Tags Ids*/
    public function getAllTagsIds($article)
    {
        return Cache::remember('tag_ids' . '_' . $article->id, 36000, function () use ($article) {
            return $article->tags()->select('tags.id')->get()->pluck('id')->toArray();
        });
    }


    public function getSimilarObjectsFromCategories($article , $type = 'text')
    {
        $category_ids = $this->getAllCategoriesIds($article , $type = 'video');

        return Cache::remember('similars' . '_' . $article->id, 36000, function () use ($category_ids , $type) {
            return Article::Select('id', 'status', 'head_title', 'created_at', 'updated_at')
                ->whereHas('typef' , function ($fetpe) use($type){
                    $fetpe->where('code' , $type);
                })
                ->whereHas('categories', function ($q) use ($category_ids) {
                $q->whereIn('categories.id', $category_ids);
            })->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image', 'slug', 'description')->get();
            }])->inRandomOrder()->take(15)->get();
        });
    }


    public function getSimilarObjectsFromTags($article , $type = 'text'){
        $tag_ids = $this->getAllTagsIds($article);
        return Cache::remember('similars_tags' . '_' . $article->id, 36000, function () use ($tag_ids , $type) {
            return Article::Select('id', 'status', 'head_title', 'type' , 'created_at', 'updated_at')
                ->whereHas('typef' , function ($fetpe) use($type){
                    $fetpe->where('code' , $type);
                })
                ->whereHas('tags', function ($q) use ($tag_ids) {
                $q->whereIn('tags.id', $tag_ids);
            })->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image', 'slug', 'description');
            }])->inRandomOrder()->take(10)->get();


        });

    }


    public function getQueryFromPosition($position , $count = 4)
    {
        /**** Special News  ****/

        $position_specific = Cache::remember('spe' . $position, 36000, function () use($position) {
            return Position::select('id')->where('code', $position )->first();
        });

        if (isset($position_specific) && !empty($position_specific)){
            return Cache::remember('position'.$position , 360, function ()
            use ($position_specific , $count) {
                return $position_specific->articles()
                    ->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
                    ->orderBy('articles.updated_at', 'DESC')
                    ->where('status', 1)
                    ->take($count)->with(['base' => function ($query) {
                        $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image', 'slug', 'description');
                    }])->get();
            });

            /**** Special News  ****/
        }
        else{
            return  [];
        }





    }

}
