<?php

require_once 'autoload.php';

use App\Controllers\NewsController;
use App\Controllers\MainPageController;


$news_controller = new NewsController();
$main_page_controller = new MainPageController();

// если в GET-запросе есть ID, если нет, но есть page - новость. иначе главная
$id = $_GET['id'] ?? null;
$page = $_GET['page'] ?? null;

if ($id && is_numeric($id)) {
    $news_controller->showItemPage($id, $page);
} elseif ($page) {    
    $news_controller->showNewsPage($page);
} else {
    $main_page_controller->showMainPage();
}