<?php

namespace Framework;

use PDO;

abstract class Model
{
    static protected $db;

    protected static function db()
    {
        if (null === static::$db) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            static::$db = new PDO($dsn, DB_USER, DB_PASS);
            
            // Включаем режим отображения ошибок в PDO
            static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return static::$db;
    }
}
