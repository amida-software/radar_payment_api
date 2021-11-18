<?php


namespace Amida\Radar\Response;


class GetOrderStatusDataSet extends BasicResponseDataSet
{
    public function getOrderNumber(): ?string
    {
        return $this->getData()->orderNumber;
    }

    public function getOrderStatus(): ?int
    {
        return $this->getData()->orderStatus;
    }

    public function getActionCode(): int
    {
        return $this->getData()->actionCode;
    }

    public function getActionCodeDescription(): string
    {
        return $this->getData()->actionCodeDescription;
    }

    public function getAmount(): int
    {
        return $this->getData()->amount;
    }

    public function getCurrency(): ?int
    {
        return $this->getData()->currency;
    }

    public function getDate(): string
    {
        return $this->getData()->date;
    }

    public function getOrderDescription(): ?string
    {
        return $this->getData()->orderDescription;
    }

    public function getIp(): string
    {
        return $this->getData()->ip;
    }

    public function getPaymentWay(): string
    {
        return $this->getData()->paymentWay;
    }

    public function getAvsCode(): ?string
    {
        return $this->getData()->avsCode;
    }

    public function getAttributes(): array
    {
        return $this->getData()->attributes;
    }

    public function getMerchantOrderParams(): array
    {
        return $this->getData()->merchantOrderParams;
    }

    public function getCardAuthInfo(): object
    {
        return $this->getData()->cardAuthInfo;
    }

    public function getBindingInfo(): object
    {
        return $this->getData()->bindingInfo;
    }

    public function getPaymentAmountInfo(): object
    {
        return $this->getData()->paymentAmountInfo;
    }

    public function getBankInfo(): object
    {
        return $this->getData()->bankInfo;
    }
}