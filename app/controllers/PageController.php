<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use App\Models\Task;

class PageController extends Controller
{
    public function index()
    {
        echo 'index method';
    }

    public function getById($id)
    {
        echo 'Id from route: ' . $id;
    }

    public function writeResponse()
    {
        return $this->response->write('This is an http response');
    }
}