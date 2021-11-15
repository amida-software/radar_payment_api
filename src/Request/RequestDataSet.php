<?php


namespace Amida\Radar\Request;



class RequestDataSet
{
    protected $attributes = [];

    public function toArray()
    {
        return $this->attributes;
    }
}