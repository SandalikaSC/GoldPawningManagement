<?php
    class pawningOfficer {
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
            $this->db->query('SELECT * FROM interest WHERE interest_ID = 1;');

            $row = $this->db->single();
            if ($this->db->rowCount() > 0) {
                return $row->Interest_Rate;
            } else {
                return 0;
            }
        }

        public function getAppointments() {
            $this->db->query('SELECT * FROM appointment LEFT JOIN time_slot
                              ON appointment.slot_Id = time_slot.slot_ID JOIN reason
                              ON reason.Reason_ID = appointment.Reason_ID');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getValidatedArticles() {
            $this->db->query('SELECT * FROM validation_articles WHERE status = 1 AND pawn_officer_or_vault_keeper LIKE "PO%";');

            $results = $this->db->resultSet();

            return $results;
        }
    }