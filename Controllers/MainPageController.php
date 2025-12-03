<?php

require_once './Models/News.php';

class MainPageController
{
    private News $newsModel;
    
    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function showMainPage()
    {
        require './Views/main_page.php';
    }

}
