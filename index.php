<?php
    //точка входа

    require_once './controllers/news_controller.php';


    $controller = new NewsController();

    // если в GET-запросе есть ID, значит это новость (иначе - список новостей)
    $id = $_GET['id'] ?? null;

    if ($id && is_numeric($id)) {
        $controller->showNewsArticle();
    } else {
        $controller->showMainPage();
    }
