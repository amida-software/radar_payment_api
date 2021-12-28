<?php


namespace Amida\Radar\Request;


class RegisterPreAuthOrderDataSet extends RequestDataSet
{
    public function setOrderNumber(string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['orderNumber'] = $value;

        return $this;
    }

    public function setAmount(int $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['amount'] = $value;

        return $this;
    }

    public function setCurrency(?int $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['currency'] = $value;

        return $this;
    }

    public function setReturnUrl(string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['returnUrl'] = $value;

        return $this;
    }

    public function setFailUrl(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['failUrl'] = $value;

        return $this;
    }

    public function setDynamicCallbackUrl(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['dynamicCallbackUrl'] = $value;

        return $this;
    }

    public function setDescription(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['description'] = $value;

        return $this;
    }

    public function setLanguage(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['language'] = $value;

        return $this;
    }

    public function setPageView(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['pageView'] = $value;

        return $this;
    }

    public function setClientId(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['clientId'] = $value;

        return $this;
    }

    public function setMerchantLogin(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['merchantLogin'] = $value;

        return $this;
    }

    public function setJsonParams(?array $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['jsonParams'] = json_encode($value);

        return $this;
    }

    public function setSessionTimeoutSecs(?int $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['sessionTimeoutSecs'] = $value;

        return $this;
    }

    public function setExpirationDate(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['expirationDate'] = $value;

        return $this;
    }

    public function setBindingId(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['bindingId'] = $value;

        return $this;
    }

    public function addFeature(Feature $value): RegisterPreAuthOrderDataSet
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

    public function removeFeature(Feature $value): RegisterPreAuthOrderDataSet
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

    public function setAutocompletionDate(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['autocompletionDate'] = $value;

        return $this;
    }

    public function setPhone(?int $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['phone'] = $value;

        return $this;
    }

    public function setEmail(?string $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['email'] = $value;

        return $this;
    }

    public function setBillingPayerData(?BillingPayerData $value): RegisterPreAuthOrderDataSet
    {
        $this->attributes['billingPayerData'] = json_encode($value);

        return $this;
    }
}