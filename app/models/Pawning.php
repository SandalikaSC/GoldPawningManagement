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
    }