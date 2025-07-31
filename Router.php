<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    /**
     * Get method
     */
    public function get($url, $fn): void
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function checkRoutes()
    {

        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ( $fn ) {
            call_user_func($fn, $this);
        } else {
            header('Location: /404');
            return;
        }
    }

    // public function render($view, $datos = [])
    // {
    //     foreach ($datos as $key => $value) {
    //         $$key = $value; 
    //     }

    //     ob_start(); 
    //     include_once __DIR__ . "/views/$view.php";
    //     $content = ob_get_clean(); // Limpia el Buffer y guarda el contenido en una variable
    //     include_once __DIR__ . '/views/templates/layout.php';
        
    //     // Layout personalizado
    //     // $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
    //     // if (str_contains($url_actual, '/admin')) {
    //     //     include_once __DIR__ . '/views/admin-layout.php';
    //     // } else {
    //     //     include_once __DIR__ . '/views/templates/layout.php';
    //     // }
    // }
}
