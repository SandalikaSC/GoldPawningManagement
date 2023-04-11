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

        // Get gold rates from the database
        public function getGoldRates() {
            $this->db->query('SELECT * FROM gold_rate');
            
            $results = $this->db->resultSet();

            return $results;
        }

        public function updateStatus($articleId, $appraiser_id) {
            $this->db->query('UPDATE validation_articles SET status=1, gold_appraiser=:appraiser_id WHERE id=:article_id;');
            $this->db->bind(':appraiser_id', $appraiser_id);
            $this->db->bind(':article_id', $articleId);
        }

        // Get last article id from article table
        public function getLastArticleId() {
            $sql = "SELECT Article_Id FROM article ORDER BY Article_Id DESC LIMIT 1";
            $this->db->query($sql);
            $result = $this->db->single();

            if(empty($result)) {
                return 'A000';
            } else {
                return $result->Article_Id;
            }
        }

        // Insert validation details of articles
        public function validateNewArticles($data) {
            // Get the last article ID in the table
            $article_id = $this->getLastArticleId();
            // New article ID
            ++$article_id;

            $this->db->query('UPDATE validation_articles SET validation_status=:validation_status, karatage=:karatage, weight=:weight, estimated_value=:estimated_value WHERE id=:validation_id;');

            if($data['validation_status'] == 'Valid') {
                $this->db->bind(':validation_status', 1);
            } else {
                $this->db->bind(':validation_status', 0);
            }

            $this->db->bind(':karatage', $data['karats']);
            $this->db->bind(':weight', $data['weight']);
            $this->db->bind(':estimated_value', $data['estimated_value']);
            $this->db->bind(':validation_id', $data['validation_id']);   


            if ($this->db->execute()) {
                $this->db->query('INSERT INTO article (Article_Id, Estimated_Value, Karatage, Weight, Type, Karatage_Price, Rate_Id, image) 
                              VALUES(:article_id, :estimated_value, :karatage, :weight, :type, :karatage_price, :rate_id, :image)');

                $this->db->bind(':article_id', $article_id);
                $this->db->bind(':estimated_value', $data['estimated_value']);
                $this->db->bind(':karatage', $data['karats']);
                $this->db->bind(':weight', $data['weight']);
                $this->db->bind(':type', $data['article_details']->article_type);     

                foreach($data['gold_rates'] as $rates) : 
                    if($data['karats'] == $rates->Karatage) {
                        $this->db->bind(':karatage_price', $rates->Price);
                        $this->db->bind(':rate_id', $rates->Rate_Id);
                    } 
                endforeach;
                    
                $this->db->bind(':image', $data['article_details']->image);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }