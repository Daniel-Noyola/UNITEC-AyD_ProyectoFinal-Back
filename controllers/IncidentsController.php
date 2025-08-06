<?php

namespace Controllers;

use Classes\DB;
use PDO;

class IncidentsController {
    public static function index()
    {
        $db = DB::connect();
        $query = "SELECT * FROM incidents";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $res = array_map(function ($row) {
            return [
                ...$row,
                'latitude' => (float) $row['latitude'],
                'longitude' => (float) $row['longitude']
            ];
        }, $res);
        
        http_response_code(200);
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public static function store()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $input = file_get_contents("php://input");
        $data = json_decode($input, true);

        $db = DB::connect();

        // Sentencia SQL con parámetros
        $sql = "INSERT INTO incidents (title, description, direction, latitude, longitude, category_id, user_id) 
                VALUES (:title, :description, :direction, :latitude, :longitude, :category_id, :user_id)";

        // Preparar la consulta
        $stmt = $db->prepare($sql);

        // Valores a insertar
        $params = [
            ':title' => $data["title"],
            ':description' => $data["description"],
            ':direction' => $data["direction"],
            ':latitude' => $data["latitude"],
            ':longitude' => $data["longitude"],
            ':category_id' => $data["category_id"],
            ':user_id' => null
        ];

        // Ejecutar
        if ($stmt->execute($params)) {
            http_response_code(201);
            echo json_encode(["message"=> "Guardado con exito"]);
        } else {
            http_response_code(500);
            echo json_encode(["message"=> "Error al guardar el registro"]);
        }

    }
}

}
