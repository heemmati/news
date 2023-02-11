<?php

namespace App\Model\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Image\HasImage;
use App\Utility\Setting\GeneralType;

class GeneralItem extends Model
{

    use SoftDeletes , HasImage;
    protected $fillable = [
        'creator_id', 'general_id', 'title', 'code', 'type', 'value'
    ];
    protected $dates = ['deleted_at'];

    public function general()
    {
        return $this->belongsTo(General::class, 'general_id');
    }

    public function getPrintAttribute()
    {

        if ($this->type == GeneralType::IMAGE){

            if (isset($this->images[0]) && !empty($this->images[0])) {
                $images = $this->images[0];
                if (isset($images) && !empty($images)){
                    return $images->src;
                }
            }
            else{
                return $this->value;
            }

        }
        else{
            return $this->value;
        }

    }
}
