<?php
    class goldAppModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function not_validated_articles() {
            $this->db->query('SELECT * FROM validation_articles WHERE status = 0');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getArticleByID($id) {
            $this->db->query('SELECT * FROM validation_articles WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getValidatedArticles() {
            $this->db->query('SELECT * FROM article');
            
            $results = $this->db->resultSet();

            return $results;
        }

        public function validateNewArticles($data) {

        }
    }