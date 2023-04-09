<?php
    class goldAppModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        // Get articles that are yet to be validated
        public function not_validated_articles() {
            $this->db->query('SELECT * FROM validation_articles WHERE status = 0');

            $results = $this->db->resultSet();

            return $results;
        }

        // Get the article details by their ID
        public function getArticleByID($id) {
            $this->db->query('SELECT * FROM validation_articles WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // Get the details of validated articles
        public function getValidatedArticles() {
            $this->db->query('SELECT * FROM article');
            
            $results = $this->db->resultSet();

            return $results;
        }

        // Insert validation details of articles
        public function validateNewArticles($data) {
            
        }

        // Get gold rates from the database
        public function getGoldRates() {
            $this->db->query('SELECT * FROM gold_rate');
            
            $results = $this->db->resultSet();

            return $results;
        }
    }