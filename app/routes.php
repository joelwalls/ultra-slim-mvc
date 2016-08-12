<?php

$app->get('/signup', 'App\Controllers\AuthController:getSignup');
$app->post('/signup', 'App\Controllers\AuthController:postSignup');

$app->get('/login', 'App\Controllers\AuthController:getLogin');
$app->post('/login', 'App\Controllers\AuthController:postLogin');

$app->get('/home', 'App\Controllers\AuthController:show');