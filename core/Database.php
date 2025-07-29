<?php
namespace Core;

use PDO;

class Database {
    protected static $connection;

    public static function connect() {
        if (!self::$connection) {
            $config = require __DIR__ . '/../config/database.php';
            self::$connection = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['user'],
                $config['pass']
            );
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }
}
