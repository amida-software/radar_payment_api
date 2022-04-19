<?php


namespace Amida\Radar\Request;


class ReverseOrderDataSet extends RequestDataSet
{
    public function setOrderId(string $value): ReverseOrderDataSet
    {
        $this->attributes['orderId'] = $value;

        return $this;
    }

    public function setLanguage(string $value): ReverseOrderDataSet
    {
        $this->attributes['language'] = $value;

        return $this;
    }
}