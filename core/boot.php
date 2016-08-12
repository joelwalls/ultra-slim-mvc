<?php

session_start();

use Slim\App;
use Illuminate\Database\Capsule\Manager as Capsule;

define('INC_ROOT', dirname(__DIR__));

$app = new App(['settings' => $config]);

$container = $app->getContainer();


$capsule = new Capsule;
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['foundHandler'] = function() {
    return new \Core\InvocationStrategy();
};
