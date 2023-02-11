<?php

namespace App\Model\Rating;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes, HasUser;

    protected $fillable = [
        'user_id', 'ip', 'value', 'ratingable_id', 'ratingable_type'

    ];

    protected $dates = ['deleted_at'];


    public function ratingable()
    {
        return $this->morphTo();
    }

}
