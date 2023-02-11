<?php


namespace App\Traits\Connection;


use App\Model\Connection\Connection;

trait HasConnection
{
    public function connections()
    {
        return $this->morphToMany(Connection::class, 'connectionable');
    }
}
