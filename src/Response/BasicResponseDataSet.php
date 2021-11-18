<?php


namespace Amida\Radar\Response;


use Psr\Http\Message\ResponseInterface;

class BasicResponseDataSet
{
    private $response;

    private $data;

    public function __construct(ResponseInterface $httpResponse)
    {
        $this->response = $httpResponse;
        $this->data = json_decode($this->response->getBody());
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getData(): object
    {
        return $this->data;
    }

    public function getErrorCode(): int
    {
        return (int) $this->data->errorCode;
    }

    public function getErrorMessage(): string
    {
        return (string) $this->data->errorMessage;
    }
}