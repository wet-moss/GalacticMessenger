<?php
namespace App\Controllers;

class MainController extends BasedController
{
        public static function showMainPage()
        {
        $data = [
            'title' =>'Главная'
        ];

        self::render('main', $data);
    }
}
