<?php 

namespace Middleware;

class AuthMiddleware {

    public static function validate()
    {
        $headers = getallheaders();

        // Validación por API key
        if (!isset($headers['X-API-KEY']) || $headers['X-API-KEY'] !== $_ENV['API_KEY']) {
            http_response_code(403);
            echo json_encode(['error' => 'Clave API no autorizada']);
            exit;
        }
    }
}
