<?php
namespace App\Controllers;

class BaseController
{
    public static function show404Page()
    {
        header("HTTP/1.0 404 Not Found");    
        require './App/Views/Pages/404.php';
    }
}