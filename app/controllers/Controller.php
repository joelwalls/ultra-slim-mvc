<?php

namespace App\Controllers;

use Slim\Container;

class Controller
{
    public function __construct(Container $ci)
    {
        $this->container = $ci;
    }
}