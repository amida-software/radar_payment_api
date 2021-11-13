# RADAR Payments API

## Requirements

* PHP ^7.2
* ext-json
* ext-curl

## Usage

Register Order
```
use Amida\Radar;

$service = new Radar\Service;
$service->setClient(new \GuzzleHttp\Client());
$service->setUser('user');
$service->setPassword('password');

$data = new Radar\Request\RegisterOrderDataSet;
$data->setEmail('test@example.com');

$response = $service->registerOrder($data);

$statusCode = $response->getStatusCode();
SstatusText = $response->getStatusText();
$messageId = $response->getMessageId();
$orderId = $response->getOrderId();
```

Run Tests
```
composer phpunit tests
```