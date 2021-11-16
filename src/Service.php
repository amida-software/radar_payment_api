<?php


namespace Amida\Radar;


use Amida\Radar\Request\RegisterOrderDataSet as RegisterOrderRequest;
use Amida\Radar\Response\RegisterOrderDataSet as RegisterOrderOrderResponse;
use Amida\Radar\Request\RegisterPreAuthOrderDataSet as RegisterOrderPreAuthRequest;
use Amida\Radar\Response\RegisterPreAuthOrderDataSet as RegisterPreAuthOrderOrderResponse;
use Amida\Radar\Request\DepositOrderDataSet as DepositOrderRequest;
use Amida\Radar\Response\DepositOrderDataSet as DepositOrderResponse;
use GuzzleHttp\ClientInterface;

class Service
{
    private $userName;
    private $password;
    private $token;

    private $client;
    private $url;

    public function registerOrder(RegisterOrderRequest $registerOrderDataSet): RegisterOrderOrderResponse
    {
        $httpResponse = $this->client->request('post', $this->getUrl().'/register.do', [
            'query' => array_merge($this->getAuthArray(), $registerOrderDataSet->toArray()),
        ]);

        return new RegisterOrderOrderResponse($httpResponse);
    }

    public function registerPreAuthOrder(RegisterOrderPreAuthRequest $registerOrderDataSet): RegisterPreAuthOrderOrderResponse
    {
        $httpResponse = $this->client->request('post', $this->getUrl().'/registerPreAuth.do', [
            'query' => array_merge($this->getAuthArray(), $registerOrderDataSet->toArray()),
        ]);

        return new RegisterPreAuthOrderOrderResponse($httpResponse);
    }

    public function depositOrder(DepositOrderRequest $registerOrderDataSet): DepositOrderResponse
    {
        $httpResponse = $this->client->request('post', $this->getUrl().'/deposit.do', [
            'query' => array_merge($this->getAuthArray(), $registerOrderDataSet->toArray()),
        ]);

        return new DepositOrderResponse($httpResponse);
    }

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function setClient(ClientInterface $client): Service
    {
        $this->client = $client;

        return $this;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $user): Service
    {
        $this->userName = $user;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Service
    {
        $this->password = $password;

        return $this;
    }

    public function setToken(string $token): Service
    {
        $this->token = $token;

        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setUrl($url): Service
    {
        $this->url = trim($url, '/');

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    private function getAuthArray(): array
    {
        $data = [];

        if ($this->userName) {
            $data['userName'] = $this->userName.'-api';
        }

        if ($this->password) {
            $data['password'] = $this->password;
        }

        if ($this->token) {
            $data['token'] = $this->token;
        }

        return $data;
    }
}