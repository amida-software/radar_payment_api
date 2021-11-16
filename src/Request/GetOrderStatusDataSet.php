<?php


namespace Amida\Radar\Request;


class GetOrderStatusDataSet extends RequestDataSet
{
    public function setOrderId(string $value): GetOrderStatusDataSet
    {
        $this->attributes['orderId'] = $value;

        return $this;
    }

    public function setOrderNumber(string $value): GetOrderStatusDataSet
    {
        $this->attributes['orderNumber'] = $value;

        return $this;
    }

    public function setLanguage(string $value): GetOrderStatusDataSet
    {
        $this->attributes['language'] = $value;

        return $this;
    }
}