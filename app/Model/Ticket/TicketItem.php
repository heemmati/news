<?php

namespace App\Model\Ticket;

use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketItem extends Model
{
    use SoftDeletes , HasTime;
    protected $fillable = [
        'from_id' ,
        'to_id' ,
        'ticket_id' ,
        'image' ,
        'file' ,
        'body' ,
        'parent_id' ,
    ];
    protected $dates = ['deleted_at'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
