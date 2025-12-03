<?php

class Database 
{

    public static function get_pdo($host = 'localhost', $dbname = 'workspace__test', 
    $login = 'root', $password = 'root')
    {  
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
        $login, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
