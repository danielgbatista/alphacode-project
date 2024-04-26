<?php

namespace App\Models;
use PDO;

class Database{
    private static $connect;

    public static function getConnection(){
        self::$connect = new PDO("mysql:host=localhost;port=3306;dbname=alphacode_test", 'root', 'root');

        return self::$connect;
    }
}