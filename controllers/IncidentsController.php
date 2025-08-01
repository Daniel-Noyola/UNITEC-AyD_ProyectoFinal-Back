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
}
