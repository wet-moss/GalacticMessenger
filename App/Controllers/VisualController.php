<?php
namespace App\Controllers;

class VisualController
{
    public static function render($pagePath, array $data = [])
    {
        extract($data);

        ob_start();
        require './App/Views/' . $pagePath . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        require './App/Views/layout.php';
    }

    public static function Page404()
    {
        header("HTTP/1.0 404 Not Found");

        self::render('404');
    }

    public static function Main(){
        $data = [
            'title' =>'Главная'
        ];

        self::render('main', $data);
    }

    public static function NewsList($page)
    {
        $news = new NewsController();
        $data = $news->getItemsListData($page);

        self::render('News/items_list', $data);
    }

    public static function ArticleDetails($id)
    {
         $news = new NewsController();
         $data = $news->getItemDetailsData($id);

         if ($data) {
            self::render('News/item_details', $data);
         } else {
            self::Page404();
         };
    }
}