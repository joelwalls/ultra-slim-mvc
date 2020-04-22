<?php

define('INC_ROOT', dirname(__DIR__));

require 'vendor/autoload.php';
require 'config/default.php';
require 'core/boot.php';
require 'app/routes.php';

$app->run();
