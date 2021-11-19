<?php

use Amida\Radar;
use Amida\Radar\Request\Feature;
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    private static $service;

    public function testRegisterOrder(): void
    {
        $response = $this->registerOrder(1);

        $this->assertInstanceOf(Radar\Response\RegisterOrderDataSet::class, $response);
        $this->assertEquals(0, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
        $this->assertIsString($response->getFormUrl());
        $this->assertIsString($response->getOrderId());
    }

    public function testRegisterPreAuthOrder(): void
    {
        $data = new Radar\Request\RegisterPreAuthOrderDataSet;
        $data->setAmount(100)->setOrderNumber(1)
            ->setReturnUrl('https://radardoc.io');

        $response = self::$service->registerPreAuthOrder($data);

        $this->assertInstanceOf(Radar\Response\RegisterPreAuthOrderDataSet::class, $response);
        $this->assertEquals(0, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
        $this->assertIsString($response->getFormUrl());
        $this->assertIsString($response->getOrderId());
    }

    public function testDepositOrder(): void
    {
        $order = $this->registerOrder(1);

        $data = new Radar\Request\DepositOrderDataSet();
        $data->setOrderId($order->getOrderId())->setAmount(100);

        $response = self::$service->depositOrder($data);

        $this->assertInstanceOf(Radar\Response\DepositOrderDataSet::class, $response);
        $this->assertEquals(7, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
    }

    public function testRefundOrder(): void
    {
        $order = $this->registerOrder(1);

        $data = new Radar\Request\RefundOrderDataSet();
        $data->setOrderId($order->getOrderId())->setAmount(100);

        $response = self::$service->refundOrder($data);

        $this->assertInstanceOf(Radar\Response\RefundOrderDataSet::class, $response);
        $this->assertEquals(7, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
    }

    public function testGetOrderStatus(): void
    {
        $order = $this->registerOrder(1);

        $data = new Radar\Request\GetOrderStatusDataSet();
        $data->setOrderId($order->getOrderId());

        $response = self::$service->getOrderStatus($data);

        $this->assertInstanceOf(Radar\Response\GetOrderStatusDataSet::class, $response);
        $this->assertEquals(0, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
        $this->assertIsInt($response->getActionCode());
        $this->assertIsString($response->getActionCodeDescription());
        $this->assertIsInt($response->getAmount());
        $this->assertIsString($response->getDate());
        //$this->assertIsString($response->getIp());
        //$this->assertIsString($response->getPaymentWay());
    }

    public function testCheckCallbackSymmetric(): void
    {
        parse_str('mdOrder=3ff6962a-7dcc-4283-ab50-a6d7dd3386fe&orderNumber=10747&checksum=14E0D9722D43BE67BFF111F53570BB5BCCFEED8AD15D72A48D51D4E949DAF988&operation=deposited&status=1$amount=123456', $data);

        $this->assertEquals(true, self::$service->checkCallbackSymmetric($data, 'test'));
    }

    public function testCheckCallbackAsymmetric(): void
    {
        $publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwtuGKbQ4WmfdV1gjWWys
5jyHKTWXnxX3zVa5/Cx5aKwJpOsjrXnHh6l8bOPQ6Sgj3iSeKJ9plZ3i7rPjkfmw
qUOJ1eLU5NvGkVjOgyi11aUKgEKwS5Iq5HZvXmPLzu+U22EUCTQwjBqnE/Wf0hnI
wYABDgc0fJeJJAHYHMBcJXTuxF8DmDf4DpbLrQ2bpGaCPKcX+04POS4zVLVCHF6N
6gYtM7U2QXYcTMTGsAvmIqSj1vddGwvNGeeUVoPbo6enMBbvZgjN5p6j3ItTziMb
Vba3m/u7bU1dOG2/79UpGAGR10qEFHiOqS6WpO7CuIR2tL9EznXRc7D9JZKwGfoY
/QIDAQAB
-----END PUBLIC KEY-----
EOD;

        parse_str('mdOrder=12b59da8-f68f-7c8d-12b5-9da8000826ea&checksum=9524FD765FB1BABFB1F42E4BC6EF5A4B07BAA3F9C809098ACBB462618A9327539F975FEDB4CF6EC1556FF88BA74774342AF4F5B51BA63903BE9647C670EBD962467282955BD1D57B16935C956864526810870CD32967845EBABE1C6565C03F94FF66907CEDB54669A1C74AC1AD6E39B67FA7EF6D305A007A474F03B80FD6C965656BEAA74E09BB1189F4B32E622C903DC52843C454B7ACF76D6F76324C27767DE2FF6E7217716C19C530CA7551DB58268CC815638C30F3BCA3270E1FD44F63C14974B108E65C20638ECE2F2D752F32742FFC5077415102706FA5235D310D4948A780B08D1B75C8983F22F211DFCBF14435F262ADDA6A97BFEB6D332C3D51010B&operation=deposited&status=1&amount=35000099', $data);

        $this->assertEquals(true, self::$service->checkCallbackAsymmetric($data, $publicKey));
    }

    public static function setUpBeforeClass(): void
    {
        self::$service = self::createService();
    }

    private static function createService(): Radar\Service
    {
        $service = new Radar\Service;
        $service->setClient(new \GuzzleHttp\Client());
        $service->setUserName('radar_payment_api');
        $service->setPassword('gvxnyE}5');
        $service->setUrl('https://sandbox.paydoc.io/payment/rest');

        return $service;
    }

    private static function registerOrder($id): Radar\Response\RegisterOrderDataSet
    {
        $data = new Radar\Request\RegisterOrderDataSet;
        $data->setAmount(100)->setOrderNumber($id)
            ->setReturnUrl('https://radardoc.io')->setJsonParams(['test' => 'value'])
            ->addFeature(Feature::AUTO_PAYMENT())
            ->setBillingPayerData((new Radar\Request\BillingPayerData)->setBillingAddressLine1('test'));

        return self::$service->registerOrder($data);
    }
}
