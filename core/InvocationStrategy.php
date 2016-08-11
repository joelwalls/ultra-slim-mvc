<?php

namespace Core;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Interfaces\InvocationStrategyInterface;

/**
* 
*/
class InvocationStrategy implements InvocationStrategyInterface
{
    
    function __invoke(
        callable $callable, 
        ServerRequestInterface $request, 
        ResponseInterface $response, 
        array $args
    ) {
        $controller = $callable[0];

        $controller->setRequest($request);
        $controller->setResponse($response);
        return call_user_func_array($callable, $args);
    }
}
