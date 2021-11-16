<?php


namespace Amida\Radar\Response;


class RegisterPreAuthOrderDataSet extends BasicResponseDataSet
{
    public function getFormUrl(): string
    {
        return $this->getData()->formUrl;
    }

    public function getOrderId(): string
    {
        return $this->getData()->orderId;
    }
}