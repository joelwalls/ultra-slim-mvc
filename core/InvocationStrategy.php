<?php

namespace Core;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Interfaces\InvocationStrategyInterface;

/**
 * Custom InvocationStrategy
 */
class InvocationStrategy implements InvocationStrategyInterface
{
    
    /**
     * Invoke a route callable
     * @param  callable               $callable The callable to invoke using the strategy.
     * @param  ServerRequestInterface $request  The request object.
     * @param  ResponseInterface      $response The response object.
     * @param  array                  $args     The reoute's placeholders arguments.
     * @return ResponseInterface|string         The reponse from the callable
     */
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
