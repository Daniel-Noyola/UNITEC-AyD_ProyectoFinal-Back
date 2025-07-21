<?php

use Dotenv\Dotenv;
use Middleware\AuthMiddleware;

require __DIR__ . '/../vendor/autoload.php';

//* Configuración de las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require __DIR__ . '/cors.php';

//Validación de Api key
AuthMiddleware::validate();
