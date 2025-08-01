<?php

use Controllers\IncidentsController;
use Controllers\MainController;
use MVC\Router;

require_once __DIR__ . '/includes/app.php';

$router = new Router();

//? Rutas de la API 
$router->get('/', [MainController::class, 'index']);
$router->get('/incidents', [IncidentsController::class, 'index']);

$router->checkRoutes();
