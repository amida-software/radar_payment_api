<?php


namespace Amida\Radar\Response;


class RegisterOrderDataSet extends BasicResponseDataSet
{
    public function getFormUrl(): ?string
    {
        return $this->getData()->formUrl;
    }

    public function getOrderId(): ?string
    {
        return $this->getData()->orderId;
    }
}