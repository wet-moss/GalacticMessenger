<?php

class DB
{
    private static ?PDO $pdo = null;

    public static function connect($host = 'localhost', $dbname = 'workspace__test', 
    $login = 'root', $password = 'root'): PDO
    {  
        if (self::$pdo == null) {
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
            $login, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$pdo;
    }
}

$pdo = DB::connect();
