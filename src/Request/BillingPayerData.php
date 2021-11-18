<?php

namespace Amida\Radar\Request;

use JsonSerializable;

class BillingPayerData extends RequestDataSet implements JsonSerializable
{
    public function jsonSerialize()
    {
        return $this->attributes;
    }

    public function setBillingCity(?string $value): BillingPayerData
    {
        $this->attributes['billingCity'] = $value;

        return $this;
    }

    public function setBillingCountry(?string $value): BillingPayerData
    {
        $this->attributes['billingCountry'] = $value;

        return $this;
    }

    public function setBillingAddressLine1(?string $value): BillingPayerData
    {
        $this->attributes['billingAddressLine1'] = $value;

        return $this;
    }

    public function setBillingAddressLine2(?string $value): BillingPayerData
    {
        $this->attributes['billingAddressLine2'] = $value;

        return $this;
    }

    public function setBillingAddressLine3(?string $value): BillingPayerData
    {
        $this->attributes['billingAddressLine3'] = $value;

        return $this;
    }

    public function setBillingPostalCode(?string $value): BillingPayerData
    {
        $this->attributes['billingPostalCode'] = $value;

        return $this;
    }

    public function setBillingState(?string $value): BillingPayerData
    {
        $this->attributes['billingState'] = $value;

        return $this;
    }
}