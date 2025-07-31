<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

//* Configuración de las variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require __DIR__ . '/cors.php';