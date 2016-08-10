<?php

namespace App\Controllers;

use Psr\Http\Message\RequestInterface as Request;
use App\Models\Task;

class PageController extends Controller
{
    public function index()
    {
        var_dump($this->container);
    }

    public function all(Request $request)
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            echo $task->name;
        }

        var_dump($request);
    }
}