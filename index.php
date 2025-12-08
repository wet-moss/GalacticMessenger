<?php

require_once 'autoload.php';

use App\Controllers\NewsController;
use App\Controllers\MainController;
use App\Controllers\BasedController;

$newsController = new NewsController();
$mainPageController = new MainController();
$baseController = new BasedController();

$uri = $_SERVER['REQUEST_URI'];

if (preg_match("{^/news/(page-(\d+)/)?$}", $uri, $matches)) {
    // новости
    $page = $matches[2] ?? 1;
    $newsController->showItemsList($page);
} elseif (preg_match("{^/news/(\d+)/$}", $uri, $matches)) {
    // статья
    $id = $matches[1];
    $newsController->showItemDetails($id);
} elseif (preg_match("(^/$)", $uri)) {
    // главная страница
    $mainPageController->showMain();
} else {
    // ошибка 404
    $baseController->show404Page();
}