<?php

use Controllers\MainController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';

$router = new Router();

//? Rutas de la API 
$router->get('/api', [MainController::class, 'index']);

$router->checkRoutes();
