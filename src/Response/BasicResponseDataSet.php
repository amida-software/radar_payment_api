<?php


namespace Amida\Radar\Response;


use Psr\Http\Message\ResponseInterface;

class BasicResponseDataSet
{
    private $response;

    private $data;
    private $body;

    public function __construct(ResponseInterface $httpResponse)
    {
        $this->response = $httpResponse;
        $this->body = $this->response->getBody();
        $this->data = json_decode($this->body);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getData(): object
    {
        return $this->data;
    }

    public function getBody(): array
    {
        return json_decode($this->body, true);
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