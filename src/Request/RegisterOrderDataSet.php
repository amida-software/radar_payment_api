<?php


namespace Amida\Radar\Request;


class RegisterOrderDataSet extends RequestDataSet
{
    public function setOrderNumber(string $value): RegisterOrderDataSet
    {
        $this->attributes['orderNumber'] = $value;

        return $this;
    }

    public function setAmount(int $value): RegisterOrderDataSet
    {
        $this->attributes['amount'] = $value;

        return $this;
    }

    public function setCurrency(?int $value): RegisterOrderDataSet
    {
        $this->attributes['currency'] = $value;

        return $this;
    }

    public function setReturnUrl(string $value): RegisterOrderDataSet
    {
        $this->attributes['returnUrl'] = $value;

        return $this;
    }

    public function setFailUrl(?string $value): RegisterOrderDataSet
    {
        $this->attributes['failUrl'] = $value;

        return $this;
    }

    public function setDynamicCallbackUrl(?string $value): RegisterOrderDataSet
    {
        $this->attributes['dynamicCallbackUrl'] = $value;

        return $this;
    }

    public function setDescription(?string $value): RegisterOrderDataSet
    {
        $this->attributes['description'] = $value;

        return $this;
    }

    public function setLanguage(?string $value): RegisterOrderDataSet
    {
        $this->attributes['language'] = $value;

        return $this;
    }

    public function setPageView(?string $value): RegisterOrderDataSet
    {
        $this->attributes['pageView'] = $value;

        return $this;
    }

    public function setClientId(?string $value): RegisterOrderDataSet
    {
        $this->attributes['clientId'] = $value;

        return $this;
    }

    public function setMerchantLogin(?string $value): RegisterOrderDataSet
    {
        $this->attributes['merchantLogin'] = $value;

        return $this;
    }

    public function setJsonParams(?array $value): RegisterOrderDataSet
    {
        $this->attributes['jsonParams'] = json_encode($value);

        return $this;
    }

    public function setSessionTimeoutSecs(?int $value): RegisterOrderDataSet
    {
        $this->attributes['sessionTimeoutSecs'] = $value;

        return $this;
    }

    public function setExpirationDate(?string $value): RegisterOrderDataSet
    {
        $this->attributes['expirationDate'] = $value;

        return $this;
    }

    public function setBindingId(?string $value): RegisterOrderDataSet
    {
        $this->attributes['bindingId'] = $value;

        return $this;
    }

    public function addFeature(Feature $value): RegisterOrderDataSet
    {
        if (!isset($this->attributes['features'])) {
            $features = [];
        } else {
            $features = explode(',', $this->attributes['features']);
        }

        $features[] = $value;

        $this->attributes['features'] = implode(',', array_unique($features));

        return $this;
    }

    public function removeFeature(Feature $value): RegisterOrderDataSet
    {
        if (!isset($this->attributes['features'])) {
            return $this;
        } else {
            $features = explode(',', $this->attributes['features']);
        }

        $removeIndex = null;
        foreach ($features as $index => $feature) {
            if ($feature == $value) {
                $removeIndex = $index;
            }
        }

        if ($removeIndex) {
            unset($features[$removeIndex]);
            $features = array_values($features);
        }

        $this->attributes['features'] = implode(',', array_unique($features));

        return $this;
    }

    public function setFeatures(Feature $value): RegisterOrderDataSet
    {
        $this->attributes['features'] = $value;

        return $this;
    }

    public function setPhone(?int $value): RegisterOrderDataSet
    {
        $this->attributes['phone'] = $value;

        return $this;
    }

    public function setEmail(?int $value): RegisterOrderDataSet
    {
        $this->attributes['email'] = $value;

        return $this;
    }

    public function setBillingPayerData(?BillingPayerData $value): RegisterOrderDataSet
    {
        $this->attributes['billingPayerData'] = json_encode($value);

        return $this;
    }
}