<?php 

namespace Classes;

use PDO;
use PDOException;

class DB {
    private static ?PDO $instance = null;

    public static function connect(): PDO
    {
        if (self::$instance !== null) return self::$instance;

        $host = $_ENV['DB_HOST'] ?? '';
        $dbname = $_ENV['DB_NAME'] ?? '';
        $port = $_ENV['DB_PORT'] ?? '3306';
        $user = $_ENV['DB_USER'] ?? '';
        $pass = $_ENV['DB_PASS'] ?? '';

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        try
        {
            self::$instance = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            return self::$instance;
        } 
        catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
