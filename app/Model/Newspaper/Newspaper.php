<?php

namespace App\Model\Newspaper;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\File\HasFile;
use App\Traits\Image\HasImage;
use App\Traits\Tag\HasTag;

class Newspaper extends Model
{
    use SoftDeletes , HasBase , HasUser , HasImage , HasFile , HasTag;
    protected $fillable = [
        'creator_id', 'type_id', 'print_date', 'number', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function type()
    {
        return $this->belongsTo(NewspaperType::class , 'type_id');
    }
}
