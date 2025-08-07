<?php

namespace Controllers;

use Classes\DB;

class UserController 
{
    public static function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $input = file_get_contents("php://input");
            $data = json_decode($input, true);

            $db = DB::connect();

            // Verificar si el email ya existe
            $sqlCheck = "SELECT id FROM users WHERE email = :email";
            $stmtCheck = $db->prepare($sqlCheck);
            $stmtCheck->execute([':email' => $data["email"]]);
            if ($stmtCheck->fetch()) {
                http_response_code(409); // 409 Conflict
                echo json_encode(["message" => "El correo ya está registrado"]);
                return;
            }

            // Hashear contraseña
            $passHash = password_hash($data["password"], PASSWORD_BCRYPT);
    

            // Insertar nuevo usuario
            $sql = "INSERT INTO users (name, email, password)
                    VALUES (:name, :email, :password)";

            $stmt = $db->prepare($sql);

            $params = [
                ':name' => $data["name"],
                ':email' => $data["email"],
                ':password' => $passHash
            ];

            if ($stmt->execute($params)) {
                http_response_code(201);
                echo json_encode(["message"=> "Guardado con exito"]);
            } else {
                http_response_code(500);
                echo json_encode(["message"=> "Error al guardar el usuario"]);
            }
        }
    }

    public static function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $input = file_get_contents("php://input");
            $data = json_decode($input, true);

            $db = DB::connect();

            // Buscar usuario por email
            $sql = 'SELECT * FROM users WHERE email = :email';
            $stmt = $db->prepare($sql);
            $stmt->execute([':email' => $data["email"]]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user && password_verify($data["password"], $user["password"])) {
                http_response_code(200);
                echo json_encode([
                    "id" => $user["id"],
                    "name" => $user["name"],
                    "email" => $user["email"]
                ]);
            } else {
                http_response_code(401);
                echo json_encode(["message" => "Credenciales incorrectas"]);
            }
        }
    }
}
