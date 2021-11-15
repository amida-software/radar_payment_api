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
        $this->assertIsString($response->getErrorMessage());
        $this->assertIsString($response->getFormUrl());
        $this->assertIsString($response->getOrderId());
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
