<?php
namespace App\Controllers;

class MainController extends BasedController
{
    public function showMain()
    {
        $data = [
            'title' =>'Главная'
        ];

        self::render('main', $data);
    }
}
