<?php

$app->get('/', '\App\Controllers\PageController:index');

$app->get('/page/{id}', '\App\Controllers\PageController:getById');

$app->get('/response', '\App\Controllers\PageController:writeResponse');