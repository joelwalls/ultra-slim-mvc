<?php

namespace Core;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Controller
{
    protected $container;
    protected $request;
    protected $response;
    
    public function __construct(ContainerInterface $ci)
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

    public function render($view, array $data = [])
    {
        require INC_ROOT . '/app/views/' . $view . '.php';
    }
}