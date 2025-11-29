<?php

namespace Config;

use mysqli;

class Database {
    private const HOST = "db";
    private const USER = "root";
    private const DATABASE = "real_state";
    private const PORT = 3306;

    public static function connect():mysqli {
        $PASS = getenv("MYSQL_ROOT_PASSWORD");
        $database = new mysqli(
            self::HOST,
            self::USER,
            $PASS,
            self::DATABASE,
            self::PORT
        );

        if ($database->connect_error) {
            die("Falha na conexão com o MySQL: " . $database->connect_error);
        }

        return $database;
    }
}
