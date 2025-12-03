<?php

require './models/News.php';

class NewsController
{
    private News $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function getCurrentPage(): int
    {
        return (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    }

    public function paginateNews(int $currentPage, int $newsPerPage = 4): array
    {
        $numberOfNews = $this->newsModel->getNumberOfNews();
        $numberOfPages = ceil($numberOfNews / $newsPerPage);

        switch (true) {
            case ($numberOfPages <= 1):
                return [$currentPage];

            case ($numberOfPages == 2): {
                if ($numberOfPages == $currentPage) {
                    return [$currentPage - 1, $currentPage];
                }
                else {
                    return [$currentPage, $currentPage + 1];
                }
                    return [$currentPage, $currentPage + 1];
            }

            default: {
                switch ($currentPage) {
                    case 1:
                        return [$currentPage, $currentPage + 1, $currentPage + 2];
                    case $numberOfPages:
                        return [$currentPage - 2, $currentPage - 1, $currentPage];
                    default:
                        return [$currentPage - 1, $currentPage, $currentPage + 1];
                }
            }
        }
    }

    public function showMainPage(): void
    {
        $currentPage = $this->getCurrentPage();
        $lastNews = $this->newsModel->getLastNews();
        $currentNewsList = $this->newsModel->getNews($currentPage);
        $paginationPages = $this->paginateNews($currentPage);

        require './views/main_page.php';
    }


    public function showNewsArticle(): void
    {
        $id = $_GET['id'] ?? null;
        $page = $_GET['page'] ?? 1;

        $article = $this->newsModel->getArticle($id);

        require './views/news_article.php';
    }

}
