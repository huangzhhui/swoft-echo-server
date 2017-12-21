<?php

use App\Controllers\IndexController;

/* @var \Swoft\Router\Http\HandlerMapping $router */
$router = \Swoft\App::getBean('httpRouter');

$router->any('/', IndexController::class);
