<?php

namespace App\Model\News;

use App\Traits\Base\HasBase;
use App\Traits\Bookmark\HasBookmark;
use App\Traits\Category\HasCategory;
use App\Traits\Comment\HasComment;
use App\Traits\Connection\HasConnection;
use App\Traits\File\HasFile;
use App\Traits\Gallery\HasGallery;
use App\Traits\HasTime;
use App\Traits\HasUser;
use App\Traits\Icon\HasIcon;
use App\Traits\Image\HasImage;
use App\Traits\Like\HasLike;
use App\Traits\News\HasBoolean;
use App\Traits\Podcast\HasPodcast;
use App\Traits\Position\HasPosition;
use App\Traits\Rating\HasRating;
use App\Traits\Region\HasRegion;
use App\Traits\Tag\HasTag;
use App\Traits\Video\HasVideo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasBase,
        HasRegion,
        HasBoolean,
        HasLike,
        HasUser,
        HasRating,
        HasBookmark,
        HasIcon,
        SoftDeletes,
        HasCategory,
        HasComment,
        HasConnection,
        HasTime,
        HasTag, HasPosition,
        HasImage, HasVideo, HasGallery,
        HasPodcast,
        HasFile;

    protected $fillable = [
        'creator_id',
        'updator_id',
        'head_title',
        'footer_title',
        'isbig',
        'isimpo',
        'isnote',
        'isspe',
        'isrep',
        'isbot',
        'src',
        'type',
        'origin_type',
        'origin_id',
        'external_link',
        'image2',
        'code',
        'status',
    ];
    protected $dates = ['deleted_at'];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($article){

            if (isset($article->base) && !empty($article->base)) {
                $article->base->delete();
            }

            if (isset($article->producer) && !empty($article->producer)) {
            $article->producer->delete();
            }
                if (isset($article->details) && !empty($article->details)) {
            $article->details->delete();
                }

            $article->positions()->detach();
            $article->icons()->detach();
            $article->images()->detach();
            $article->videos()->detach();
            $article->files()->detach();
            $article->galleries()->detach();
            $article->podcasts()->detach();
            $article->connections()->detach();
            $article->regions()->detach();


        });



    }


    public function details()
    {
        return $this->hasOne(ArticleDetail::class, 'article_id');
    }

    public function producer()
    {
        return $this->hasOne(ArticleProducer::class, 'article_id');
    }

    public function type()
    {
        return $this->belongsTo(ArticleType::class, 'type');
    }


    public function picture()
    {
        if(isset($this->image) && !empty($this->image)){
            return Storage::url($this->image);
        }
        else{
            return url('taj-theme/assets/img/default.jpg');
        }
    }
    public function typef()
    {
        return $this->belongsTo(ArticleType::class, 'type');
    }

    public function scopeTitle($query, $title)
    {
        if (isset($title) && !empty($title)) {
            return $query->whereHas('base', function ($q) use ($title) {
                $q->where('title', 'like', '%' . $title . '%');
            });
        }
    }

    public function scopeReporter($query, $reporter)
    {
        if (isset($reporter) && !empty($reporter)) {
            return $query->whereHas('user', function ($q) use ($reporter) {
                $q->where('name', 'like', '%' . $reporter . '%');
            });
        }
    }



    public function scopeStatus($query, $status)
    {
        if (is_numeric($status)) {
            return $query->where('status', $status);
        }
    }


    public function scopeCode($query, $code)
    {
        if ((isset($code) && !empty($code))) {
            return $query->where('code', $code);
        }
    }


    public function scopeStart($query, $start)
    {
        if ((isset($start) && !empty($start))) {
            return $query->where('created_at', '>=', $start);
        }
    }


    public function scopeEnd($query, $end)
    {
        if ((isset($end) && !empty($end))) {
            return $query->where('created_at', '<=', $end);
        }
    }


    public function scopeCategory($query, $category)
    {
        if ((isset($category) && !empty($category))) {
            return $query->whereHas('categories', function ($q) use ($category) {
                $q->where('categories.id', $category);
            });
        }
    }


    public function scopeRegion($query, $region)
    {
        if ((isset($region) && !empty($region))) {
            return $query->whereHas('regions', function ($q) use ($region) {
                $q->where('regions.id', $region);
            });
        }
    }

}
