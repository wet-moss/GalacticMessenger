<?php

require_once 'autoload.php';

use App\Controllers\NewsController;
use App\Controllers\MainPageController;

$newsController = new NewsController();
$mainPageController = new MainPageController();

$index = $_SERVER['REQUEST_URI'];

// страница
$articlePattern = "(\/news\/(\d+)\/)";

// новости
$newsMainPattern = "(^\/news\/$)";
$newsCatalogPattern = "(\/news\/page-(\d+)\/)";

// главная страница
$mainPagePattern = "(^\/$)";

if (preg_match($newsMainPattern, $index) || preg_match($newsCatalogPattern, $index, $matches)) {
    $page = 1;
    if (isset($matches)) {
        $page = $matches[1];
    } 
    $newsController->showNewsPage($page);
} elseif (preg_match($articlePattern, $index, $matches)) { 
    $id= $matches[1];
    $newsController->showItemPage($id);
} elseif (preg_match($mainPagePattern, $index)) {
    $mainPageController->showMainPage();
} else {
     require './404.php';
}