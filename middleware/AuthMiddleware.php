<?php 

namespace Middleware;

class AuthMiddleware {

    public static function validate()
    {
        $apiKey = $_SERVER['HTTP_X_API_KEY'] ?? null;

        // Validar api key
        if ($apiKey !== $_ENV['API_KEY']) {
            http_response_code(403);
            echo json_encode(['error' => 'API key inválida']);
            exit;
        }
    }
}
