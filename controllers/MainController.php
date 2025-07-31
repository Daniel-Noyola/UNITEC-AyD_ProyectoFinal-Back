<?php

namespace Controllers;

use Classes\DB;
use MVC\Router;

class MainController {
    public static function index()
    {
        echo("Desde el server");
    }

    public static function test()
    {
        echo("Otra Url XD");
    }
}
