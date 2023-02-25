<?php
    class Pawning {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPawnedItems() {
            $this->db->query('SELECT * FROM pawn INNER JOIN loan ON pawn.Pawn_Id = loan.Pawn_Id');

            $results = $this->db->resultSet();

            return $results;
        }

        // Get customer details using pawned item's Pawn_Id
        public function getPawnItemById($id) {
            $this->db->query('SELECT * FROM pawn INNER JOIN loan ON pawn.Pawn_Id=loan.Pawn_Id WHERE pawn.Pawn_Id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function getLastArticleId() {
            $sql = 'SELECT Article_Id FROM article ORDER BY Article_Id DESC LIMIT 1';
            $this->db->query($sql);
            $result = $this->db->single();

            if(empty($result)) {
                return 'A000';
            } else {
                return $result->Article_Id;
            }
        }

        // public function findCustomerByNic($nic) {
        //     $this->db->query('SELECT UserId FROM user WHERE NIC = :nic ');
        //     // Bind value
        //     $this->db->bind(':nic', $nic);

        //     $row = $this->db->single();

            
        // }

        public function getCustomerByNIC($nic) {
            $this->db->query('SELECT * FROM user INNER JOIN phone ON user.UserId=phone.userId WHERE user.NIC = :nic && type = "Customer"');
            $this->db->bind(':nic', $nic);

            $row = $this->db->single();

            // Check row
            if ($row) {
                $customer = $row;
                // return $row->UserId;
                return $customer;
            } else {
                return false;
            }
        } 

        // Add Article
        public function addArticle($data) {
            $article_id = $this->getLastArticleId();
            ++$article_id;

            $this->db->query('INSERT INTO article (Article_Id, Type, image, Rate_Id) VALUES(:article_id, :type, :image, :rate_id)');

            $this->db->bind(':article_id', $article_id);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':rate_id', 1);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }