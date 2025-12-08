<?php
namespace App\Controllers;

use App\Models\News;

class NewsController extends BaseController
{
    private News $newsModel;
    public $currentPage;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function paginateItems(int $currentPage, int $itemsPerPage = 4): array
    {
        $numberOfItems = $this->newsModel->getNumberOfItems();
        $numberOfPages = ceil($numberOfItems / $itemsPerPage);

        switch (true) {
            case ($numberOfPages <= 1):
                return [$currentPage];

            case ($numberOfPages == 2):
                if ($numberOfPages == $currentPage) {
                    return [$currentPage - 1, $currentPage];
                } else {
                    return [$currentPage, $currentPage + 1];
                }

            default:
                switch ($currentPage) {
                    case 1:
                        return 
                        [$currentPage, $currentPage + 1, $currentPage + 2];
                    case $numberOfPages:
                        return 
                        [$currentPage - 2, $currentPage - 1, $currentPage];
                    default:
                        return 
                        [$currentPage - 1, $currentPage, $currentPage + 1];
                }
        }
    }


    public function showNewsPage($page)
    {
        $currentPage = $page;
        $lastItems = $this->newsModel->getLastItem();
        $currentItemsList = $this->newsModel->getItems($page);
        $paginationPages = $this->paginateItems($page);
        require './App/Views/Pages/news_catalog.php';
    }

    public function showItemPage($id)
    {
        $page = $this->currentPage;
        $itemInfo = $this->newsModel->getItemInfo($id);
        if ($itemInfo) {
            $article = $this->newsModel->getItemInfo($id);
            require './App/Views/Pages/news_article.php';
        } else {
            $this->show404Page();
        }
    }
}