<?php


namespace App\Traits;


trait HasLub
{

    protected $insertable = true;

    public function getListables()
    {
        return $this->listable;
    }

    public function getRoute()
    {
        return $this->route_name;
    }

    public function getFormables()
    {
        return $this->formables;
    }

    public function getParentables()
    {
        return $this->parentables;
    }

    public function getInsertable()
    {
        return $this->insertable;
    }

    public function getShowables()
    {
        return $this->showables;
    }

    public function getEvents()
    {
        return $this->events;
    }
    public function getShow(){
        return $this->viewable;
    }

    public function getEventIn()
    {
        return $this->evenins;
    }

}
