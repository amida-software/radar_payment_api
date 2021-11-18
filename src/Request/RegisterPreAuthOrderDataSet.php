<?php


namespace Amida\Radar\Request;


class RegisterPreAuthOrderDataSet extends RegisterOrderDataSet
{
    public function setAutocompletionDate(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['autocompletionDate'] = $value;

        return $this;
    }
}