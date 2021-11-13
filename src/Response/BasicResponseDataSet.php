<?php


namespace Amida\Radar\Response;


use Psr\Http\Message\ResponseInterface;

class BasicResponseDataSet
{
    private $response;

    public function __construct(ResponseInterface $httpResponse)
    {
        $this->response = $httpResponse;
    }
}