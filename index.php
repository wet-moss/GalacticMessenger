<?php

require_once 'autoload.php';

use App\Controllers\VisualController;

$uri = $_SERVER['REQUEST_URI'];

if (preg_match("{^/news/(page-(\d+)/)?$}", $uri, $matches)) {
    // новости
    $page = $matches[2] ?? 1;
    VisualController::NewsList($page);
} elseif (preg_match("{^/news/(\d+)/$}", $uri, $matches)) {
    // статья
    $id = $matches[1];
    VisualController::ArticleDetails($id);
} elseif (preg_match("(^/$)", $uri)) {
    // главная страница
    VisualController::Main();
} else {
    // ошибка 404
    VisualController::Page404();
}