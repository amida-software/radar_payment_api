<?php

use Amida\Radar;
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    private static $service;

    public function testRegisterOrder(): void
    {
        $data = new Radar\Request\RegisterOrderDataSet;
        $data->setAmount(100)->setOrderNumber(1)
            ->setReturnUrl('https://radardoc.io');

        $response = self::$service->registerOrder($data);

        $this->assertInstanceOf(Radar\Response\RegisterOrderDataSet::class, $response);
        $this->assertIsInt($response->getErrorCode());
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
        $this->assertIsInt($response->getErrorCode());
        $this->assertEquals(0, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
        $this->assertIsString($response->getFormUrl());
        $this->assertIsString($response->getOrderId());
    }

    public function testDepositOrder(): void
    {
        $data = new Radar\Request\DepositOrderDataSet();
        $data->setOrderId('test')->setAmount(100);

        $response = self::$service->depositOrder($data);

        $this->assertInstanceOf(Radar\Response\DepositOrderDataSet::class, $response);
        $this->assertIsInt($response->getErrorCode());
        $this->assertEquals(0, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
    }

    public function testRefundOrder(): void
    {
        $data = new Radar\Request\RefundOrderDataSet();
        $data->setOrderId('test')->setAmount(100);

        $response = self::$service->refundOrder($data);

        $this->assertInstanceOf(Radar\Response\RefundOrderDataSet::class, $response);
        $this->assertIsInt($response->getErrorCode());
        $this->assertEquals(0, $response->getErrorCode());
        $this->assertIsString($response->getErrorMessage());
    }

    public function testGetOrderStatus(): void
    {
        $data = new Radar\Request\GetOrderStatusDataSet();
        $data->setOrderId('test');

        $response = self::$service->getOrderStatus($data);

        $this->assertInstanceOf(Radar\Response\GetOrderStatusDataSet::class, $response);
        $this->assertIsInt($response->getErrorCode());
        $this->assertEquals(0, $response->getErrorCode());
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
        $service->setUserName('user');
        $service->setPassword('password');
        $service->setUrl('https://sandbox.paydoc.io/payment/rest');

        return $service;
    }
}
