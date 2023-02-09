<?php
    class adminModel {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Get gold rates
        public function getGoldRates() {
            $this->db->query('SELECT * FROM gold_rate;');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getInterestRates() {
            $this->db->query('SELECT Interest_Rate FROM interest ORDER BY Last_Edit DESC LIMIT 1;');
            $this->db->query('SELECT * FROM interest');

            $row = $this->db->single();
            if ($this->db->rowCount() > 0) {
                return $row->Interest_Rate;
            } else {
                return 0;
            }
        }

        public function getPawnedItems() {
            $this->db->query('SELECT * FROM pawn INNER JOIN loan ON pawn.Pawn_Id = loan.Pawn_Id');

            $results = $this->db->resultSet();

            return $results;
        }
    }