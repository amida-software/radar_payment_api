<?php

use Amida\Radar;
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    private static $service;

    public function testRegisterOrder(): void
    {
        $response = $this->registerOrder(1);

        $this->assertInstanceOf(Radar\Response\RegisterOrderDataSet::class, $response);
        $this->assertEquals(0 ,$response->getErrorCode());
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
        $this->assertEquals(0 ,$response->getErrorCode());
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
        $this->assertEquals(0 ,$response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
    }

    public function testRefundOrder(): void
    {
        $order = $this->registerOrder(1);

        $data = new Radar\Request\RefundOrderDataSet();
        $data->setOrderId($order->getOrderId())->setAmount(100);

        $response = self::$service->refundOrder($data);

        $this->assertInstanceOf(Radar\Response\RefundOrderDataSet::class, $response);
        $this->assertEquals(0 ,$response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
    }

    public function testGetOrderStatus(): void
    {
        $order = $this->registerOrder(1);

        $data = new Radar\Request\GetOrderStatusDataSet();
        $data->setOrderId($order->getOrderId());

        $response = self::$service->getOrderStatus($data);

        $this->assertInstanceOf(Radar\Response\GetOrderStatusDataSet::class, $response);
        $this->assertEquals(0 ,$response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
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
            ->setBillingPayerData((new Radar\Request\BillingPayerData)->setBillingAddressLine1('test'));

        return self::$service->registerOrder($data);
    }
}
