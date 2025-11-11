<?php

namespace Config;

use mysqli;

class Database {
    private const HOST = "172.19.0.2";
    private const USER = "root";
    private const PASS = "myfirstpassword";
    private const DATABASE = "real_state";
    private const PORT = 3306;

    public static function connect():mysqli {
        $database = new mysqli(
            self::HOST,
            self::USER,
            self::PASS,
            self::DATABASE,
            self::PORT
        );

        if ($database->connect_error) {
            die("Falha na conexão com o MySQL: " . $database->connect_error);
        }

        return $database;
    }
}
