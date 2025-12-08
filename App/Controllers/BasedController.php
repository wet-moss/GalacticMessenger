<?php
namespace App\Controllers;

class BasedController
{
    public static function show404Page()
    {
        header("HTTP/1.0 404 Not Found");
        self::render('404');
    }

    public static function render($pagePath, array $data = [])
    {
        extract($data);

        ob_start();
        require './App/Views/' . $pagePath . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        
        require './App/Views/layout.php';
    }
}