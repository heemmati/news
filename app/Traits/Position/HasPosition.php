<?php


namespace App\Traits\Position;


use App\Model\Position\Position;

trait HasPosition
{
    public function positions()
{
    return $this->morphToMany(Position::class, 'positionable');
}

}
