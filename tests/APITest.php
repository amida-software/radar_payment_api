<?php

use Amida\Radar;
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    private static $service;

    public function testRegisterOrder(): void
    {
        $data = new Radar\Request\RegisterOrderDataSet;

        $response = self::$service->registerOrder($data);

        $this->assertInstanceOf(Radar\Response\RegisterOrderDataSet::class, $response);
    }

    public static function setUpBeforeClass(): void
    {
        self::$service = self::createService();
    }

    private static function createService(): Radar\Service
    {
        $service = new Radar\Service;
        $service->setClient(new \GuzzleHttp\Client());
        $service->setUser('user');
        $service->setPassword('password');

        return $service;
    }
}
