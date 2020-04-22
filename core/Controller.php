<?php

namespace Core;

use Slim\Container;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Base Controller class
 *
 * All Controllers must extends from this class.
 */
class Controller
{
    /**
     * Container object
     * @var Slim\Container
     */
    protected $container;

    /**
     * Request Object
     * @var Slim\Http\Request
     */
    protected $request;

    /**
     * Response object
     * @var Slim\Http\Response
     */
    protected $response;

    /**
     * Path where templates are saved
     * @var string
     */
    protected $templatePath;
    
    /**
     * Creates a new Controller Object and asigns the Container
     * @param Container $ci 
     */
    public function __construct(Container $ci)
    {
        $this->container = $ci;
        $this->templatePath = $this->container['settings']['templatePath'];
    }

    /**
     * Sets the request object
     * @param ServerRequestInterface $request 
     */
    public function setRequest(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * Sets the response object
     * @param ResponseInterface $response 
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Renders a template
     * @param  string $template 
     * @param  array  $data     
     * @return Slim\Http\Response           
     */
    public function render($template, array $data = [])
    {
        $output = $this->fetch($template, $data);

        return $this->response->getBody()->write($output);
    }

    /**
     * Renders a template and returns the result as a string
     * @param  string $template 
     * @param  array  $data     
     * @return mixed           
     */
    private function fetch($template, array $data = [])
    {
        ob_start();

        $this->includeScope($this->templatePath . $template . '.php', $data);

        $output = ob_get_clean();

        return $output;
    }

    /**
     * Includes the template file
     * @param  string $template 
     * @param  array  $data     
     */
    private function includeScope($template, array $data)
    {
        extract($data);
        include $template;
    }
}