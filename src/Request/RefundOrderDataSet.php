<?php


namespace Amida\Radar\Request;


class RefundOrderDataSet extends RequestDataSet
{
    public function setOrderId(string $value): RefundOrderDataSet
    {
        $this->attributes['orderId'] = $value;

        return $this;
    }

    public function setAmount(int $value): RefundOrderDataSet
    {
        $this->attributes['amount'] = $value;

        return $this;
    }

    public function setLanguage(string $value): RefundOrderDataSet
    {
        $this->attributes['language'] = $value;

        return $this;
    }
}