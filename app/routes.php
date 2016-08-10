<?php

$app->get('/', '\App\Controllers\PageController:index');

$app->get('/all', '\App\Controllers\PageController:all');