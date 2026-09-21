<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Cargar variables de entorno desde la raíz o includes
$rootPath = dirname(__DIR__);
$dotenvPath = file_exists($rootPath . '/.env') ? $rootPath : __DIR__;
$dotenv = Dotenv::createImmutable($dotenvPath);
$dotenv->safeLoad();

require __DIR__ . '/cors.php';