<?php

use Controllers\MainController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

$router = new Router();

//? Public section
$router->get('/', [MainController::class, 'index']);

$router->checkRoutes();
