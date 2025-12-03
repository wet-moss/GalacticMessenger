<?php

require './db.php';

class News
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = get_pdo();
    }

    public function getLastNews(): array
    {
        $pdoStatement = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 1");
        return $pdoStatement->fetch(PDO::FETCH_ASSOC);
    }

    //для вывода новостей по 4
    public function getNews(int $currentPage, int $newsPerPage = 4): array
    {
        $start = ($currentPage - 1) * $newsPerPage;
        $pdoStatement = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT $newsPerPage OFFSET $start");
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticle(int $id): array
    {
        $pdoStatement = $this->pdo->prepare("SELECT * FROM news WHERE id = :id");
        $pdoStatement->execute(['id' => $id]);
        return $pdoStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function getNumberOfNews(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }
}



