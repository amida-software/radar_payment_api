# RADAR Payments API

## Requirements

* PHP ^7.2
* ext-json
* ext-curl
* ext-openssl

## Usage

Register Order

```
use Amida\Radar;

$service = new Radar\Service;
$service->setClient(new \GuzzleHttp\Client())
    ->setUserName('radar_payment_api')
    ->setPassword('gvxnyE}5')
    ->setUrl('https://sandbox.paydoc.io/payment/rest');

$data = new Radar\Request\RegisterOrderDataSet;
$data->setAmount(100)->setOrderNumber($id)
    ->setReturnUrl('https://radardoc.io')->setJsonParams(['test' => 'value'])
    ->addFeature(Feature::AUTO_PAYMENT())
    ->setBillingPayerData((new Radar\Request\BillingPayerData)->setBillingAddressLine1('test'));
$response = $service->registerOrder($data);

echo $response->getErrorCode();
echo $response->getErrorMessage();
echo $response->getFormUrl();
echo $response->getOrderId();
```

Register Order Pre-Authorization

```
use Amida\Radar;

$service = new Radar\Service;
$service->setClient(new \GuzzleHttp\Client())
    ->setUserName('radar_payment_api')
    ->setPassword('gvxnyE}5')
    ->setUrl('https://sandbox.paydoc.io/payment/rest');

$data = new Radar\Request\RegisterPreAuthOrderDataSet;
$data->setAmount(100)->setOrderNumber($id)
    ->setReturnUrl('https://radardoc.io')->setJsonParams(['test' => 'value'])
    ->addFeature(Feature::AUTO_PAYMENT())
    ->setBillingPayerData((new Radar\Request\BillingPayerData)->setBillingAddressLine1('test'));
$response = $service->registerPreAuthOrder($data);

echo $response->getErrorCode();
echo $response->getErrorMessage();
echo $response->getFormUrl();
echo $response->getOrderId();
```

Deposit Order

```
use Amida\Radar;

$service = new Radar\Service;
$service->setClient(new \GuzzleHttp\Client())
    ->setUserName('radar_payment_api')
    ->setPassword('gvxnyE}5')
    ->setUrl('https://sandbox.paydoc.io/payment/rest');

$data = new Radar\Request\DepositOrderDataSet;
$data->setOrderId($order->getOrderId())->setAmount(100);

$response = $service->depositOrder($data);

echo $response->getErrorCode();
echo $response->getErrorMessage();
```

Deposit Order

```
use Amida\Radar;

$service = new Radar\Service;
$service->setClient(new \GuzzleHttp\Client())
    ->setUserName('radar_payment_api')
    ->setPassword('gvxnyE}5')
    ->setUrl('https://sandbox.paydoc.io/payment/rest');

$data = new Radar\Request\RefundOrderDataSet;
$data->setOrderId($order->getOrderId())->setAmount(100);

$response = $service->refundOrder($data);

echo $response->getErrorCode();
echo $response->getErrorMessage();
```

Order Status

```
use Amida\Radar;

$service = new Radar\Service;
$service->setClient(new \GuzzleHttp\Client())
    ->setUserName('radar_payment_api')
    ->setPassword('gvxnyE}5')
    ->setUrl('https://sandbox.paydoc.io/payment/rest');

$data = new Radar\Request\GetOrderStatusDataSet;
$data->setOrderId($order->getOrderId());

$response = $service->getOrderStatus($data);

echo $response->getErrorCode();
echo $response->getErrorMessage();
echo $response->getActionCode();
echo $response->getActionCodeDescription();
echo $response->getAmount();
```

Check Callback Data

```
use Amida\Radar;

$service = new Radar\Service;

$input = [
    'checksum' => '9524FD765FB1BABFB1F42E4BC6EF5A4B07BAA3F9C809098ACBB462618A9327539F975FEDB4CF6EC1556FF88BA74774342AF4F5B51BA63903BE9647C670EBD962467282955BD1D57B16935C956864526810870CD32967845EBABE1C6565C03F94FF66907CEDB54669A1C74AC1AD6E39B67FA7EF6D305A007A474F03B80FD6C965656BEAA74E09BB1189F4B32E622C903DC52843C454B7ACF76D6F76324C27767DE2FF6E7217716C19C530CA7551DB58268CC815638C30F3BCA3270E1FD44F63C14974B108E65C20638ECE2F2D752F32742FFC5077415102706FA5235D310D4948A780B08D1B75C8983F22F211DFCBF14435F262ADDA6A97BFEB6D332C3D51010B',
    'mdOrder' => '12b59da8-f68f-7c8d-12b5-9da8000826ea',
];

echo $response->checkCallbackSymmetric($data, 'key');
echo $response->checkCallbackAsymmetric($data, 'publicKey');
```

Run Tests

```
composer phpunit tests
```