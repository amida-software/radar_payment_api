<?php


namespace Amida\Radar;


use Amida\Radar\Request\RegisterOrderDataSet as RegisterOrderRequest;
use Amida\Radar\Response\RegisterOrderDataSet as RegisterOrderOrderResponse;
use GuzzleHttp\ClientInterface;

class Service
{
    private $user;
    private $password;

    public function registerOrder(RegisterOrderRequest $registerOrderDataSet): RegisterOrderOrderResponse
    {
        $httpResponse = $this->client->request('post', $this->getUrl(), [
            'auth' => [$this->user, $this->password],
            'query' => $registerOrderDataSet,
        ]);

        return new RegisterOrderOrderResponse($httpResponse);
    }

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function setClient(ClientInterface $client): void
    {
        $this->client = $client;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}