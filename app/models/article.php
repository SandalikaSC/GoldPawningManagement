<?php
class article
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getArticleById($articleId) {
        $this->db->query('SELECT * FROM article where Article_Id=:articleId');
        $this->db->bind(':articleId', $articleId);
        $results = $this->db->single();

        return $results;
    }
}