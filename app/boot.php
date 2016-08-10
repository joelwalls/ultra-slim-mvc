<?php

use Slim\App;
use Illuminate\Database\Capsule\Manager as Capsule;

$app = new App(['settings' => $config]);

$container = $app->getContainer();


$capsule = new Capsule;
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();