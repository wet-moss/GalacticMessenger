<?php
    require './db.php';

    class News {
        private PDO $pdo;
        public function __construct() {
            $this->pdo = getPDO();
        }

        public function getLastNews() {
            $pdoStatement = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 1");
            return $pdoStatement->fetch(PDO::FETCH_ASSOC);
        }

        //для вывода новостей по 4
        public function getNews(int $currentPage, int $newsPerPage = 4) {
            $start = ($currentPage - 1) * $newsPerPage;
            $pdoStatement = $this->pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT $newsPerPage OFFSET $start");
            return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getArticle($id) {
            $pdoStatement = $this->pdo->prepare("SELECT * FROM news WHERE id = :id");
            $pdoStatement->execute(['id' => $id]);
            return $pdoStatement->fetch(PDO::FETCH_ASSOC);
        }

        public function getNumberOfNews() {
            return $this->pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
    }
}



