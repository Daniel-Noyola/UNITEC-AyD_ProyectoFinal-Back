<?php

use Controllers\IncidentsController;
use Controllers\MainController;
use Controllers\UserController;
use MVC\Router;

require_once __DIR__ . '/includes/app.php';

$router = new Router();

//? Rutas de la API 
$router->get('/', [MainController::class, 'index']);
$router->get('/incidents', [IncidentsController::class, 'index']);
$router->get('/incidents/id', [IncidentsController::class, 'incidentsById']);
$router->post('/incidents/store', [IncidentsController::class, 'store']);

$router->get('/categories', [IncidentsController::class, 'categories']);

$router->post('/user/store', [UserController::class, 'store']);
$router->post('/user/login', [UserController::class, 'login']);

$router->checkRoutes();
