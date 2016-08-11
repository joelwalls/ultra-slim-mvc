<?php

namespace App\Controllers;

use Slim\Container;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Controller
{
    protected $container;
    protected $request;
    protected $response;
    
    public function __construct(Container $ci)
    {
        $this->container = $ci;
    }

    public function setRequest(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
    }
}