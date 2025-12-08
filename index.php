<?php

require_once 'autoload.php';

use App\Controllers\NewsController;
use App\Controllers\MainPageController;
use App\Controllers\BaseController;

$newsController = new NewsController();
$mainPageController = new MainPageController();
$basePageController = new BaseController();

$uri = $_SERVER['REQUEST_URI'];

// страница
$articlePattern = "{^/news/(\d+)/$}";

// новости
$newsCatalogPattern = "{^/news/(page-(\d+)/)?$}";

// главная страница
$mainPagePattern = "(^/$)";

if (preg_match($newsCatalogPattern, $uri, $matches)) {
    $page = $matches[2] ?? 1;
    $newsController->showNewsPage($page);
} elseif (preg_match($articlePattern, $uri, $matches)) {
    $id = $matches[1];
    $newsController->showItemPage($id);
} elseif (preg_match($mainPagePattern, $uri)) {
    $mainPageController->showMainPage();
} else {
    $basePageController->show404Page();
}