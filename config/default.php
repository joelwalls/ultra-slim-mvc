<?php

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'ultra-slim-mvc',
    'username' => 'root',
    'password' => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$config['templatePath'] = INC_ROOT . '/app/views/';