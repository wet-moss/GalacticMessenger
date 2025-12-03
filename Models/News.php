<?php

require_once './db.php';

class News
{
    private $database = new Database();
    private $pdo = new PDO;
    public function __construct()
    {
        $this->$pdo = Database::get_pdo();
    }

    public function getLastItem(): array
    {
        $pdoStatement = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 1");
        return $pdoStatement->fetch(PDO::FETCH_ASSOC);
    }

    //для вывода новостей по 4
    public function getItems(int $currentPage, int $itemsPerPage = 4): array
    {
        $start = ($currentPage - 1) * $itemsPerPage;
        $pdoStatement = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT $itemsPerPage OFFSET $start");
        
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemInfo(int $id): array
    {
        $pdoStatement = $this->pdo->prepare("SELECT * FROM news WHERE id = :id");
        $pdoStatement->execute(['id' => $id]);

        return $pdoStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function getNumberOfItems(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }
}



