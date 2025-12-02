<?php
    function getPDO() {
        //подключение к БД
        $pdo = new PDO("mysql:host=localhost;dbname=workspace__test;charset=utf8",
        'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
