<?php


namespace Amida\Radar\Request;


class DepositOrderDataSet extends RequestDataSet
{
    public function setOrderId(string $value): DepositOrderDataSet
    {
        $this->attributes['orderId'] = $value;

        return $this;
    }

    public function setAmount(int $value): DepositOrderDataSet
    {
        $this->attributes['amount'] = $value;

        return $this;
    }
}