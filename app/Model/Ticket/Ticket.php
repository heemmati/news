<?php

namespace App\Model\Ticket;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes ;

    protected $fillable = [
        'code' ,
        'from_id' ,
        'to_id' ,
        'department_id' ,

        'title' ,
        'priority' ,
        'body' ,
        'status'

    ];
    protected $dates = ['deleted_at'];

    public function ForMe()
    {
        return $this->belongsTo(User::class , 'to_id' , 'id');
    }

    public function FromMe()
    {
        return $this->belongsTo(User::class , 'from_id' , 'id');
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function children()
    {
        return $this->hasMany(Ticket::class, 'parent_id' , 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Ticket::class, 'parent_id', 'id');
    }

    public function items()
    {
       return $this->hasMany(TicketItem::class);
    }
    public function code_print(){
        return 'DGA-'.$this->code;
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($ticket){

            foreach ($ticket->items as $sub) {
                $sub->delete();
            }


                 });


    }



}
