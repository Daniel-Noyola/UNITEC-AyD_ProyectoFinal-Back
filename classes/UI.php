<?php

namespace Classes;

class UI {
    public static function includeComponent(string $path)
    {
        include __DIR__ . "/../views/components/{$path}.php";
    }

    public static function includeTemplate(string $path)
    {
        include __DIR__ . "/../views/templates/{$path}.php";
    }
}