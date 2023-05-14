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
            $this->db->query('SELECT * FROM pawn INNER JOIN loan ON pawn.Pawn_Id = loan.Pawn_Id INNER JOIN article ON pawn.Article_Id = article.Article_Id');

            $results = $this->db->resultSet();

            return $results;
        }

        // Get pawned article details using pawned item's Pawn_Id
        public function getPawnItemById($id) {
            $this->db->query('SELECT * FROM pawn INNER JOIN loan ON pawn.Pawn_Id=loan.Pawn_Id INNER JOIN article ON pawn.Article_Id = article.Article_Id WHERE pawn.Pawn_Id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }


        public function getAdmin() {
            $this->db->query('SELECT COUNT(UserId) AS adminCount FROM user WHERE user.type = "Admin"');

            $results = $this->db->single();

            return $results;
        }

        public function getManager() {
            $this->db->query('SELECT COUNT(UserId) AS managerCount FROM user WHERE user.type = "Manager"');

            $results = $this->db->single();

            return $results;
        }

        public function getCustomer() {
            $this->db->query('SELECT COUNT(UserId) AS customerCount FROM user WHERE user.type = "Customer"');

            $results = $this->db->single();
            return $results;
        }
        
        public function getPawnItemPaymentById($id) {
            $this->db->query('SELECT * FROM pawn INNER JOIN payment ON pawn.Pawn_Id=payment.Pawn_Id WHERE pawn.Pawn_Id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();


            return $results;
        }


        public function getPawningOfficer() {
            $this->db->query('SELECT COUNT(UserId) AS pawningofficerCount FROM user WHERE user.type = "Pawning Officer"');

            $results = $this->db->single();

            return $results;
        }

        public function getVaultKeeper() {
            $this->db->query('SELECT COUNT(UserId) AS vaultkeeperCount FROM user WHERE user.type = "Vault Keeper"');

            $results = $this->db->single();

            return $results;
        }

        public function getPayment() {
            // $this->db->query('SELECT user.UserId AS UserId, user.First_Name AS First_Name, payment.Type AS PayType, payment.Amount AS Amount  FROM payment LEFT JOIN pawn ON pawn.Pawn_Id=payment.Pawn_Id LEFT JOIN user ON user.UserId=pawn.UserId GROUP BY payment.PID ORDER BY payment.PID DESC LIMIT 6');
            $this->db->query('SELECT user.UserId AS UserId, user.First_Name AS First_Name, payment.Type AS PayType, payment.Amount AS Amount, payment.Date FROM payment INNER JOIN pawn ON pawn.Pawn_Id=payment.Pawn_Id INNER JOIN user ON user.UserId=pawn.UserId  ORDER BY  payment.Date DESC LIMIT 6');

            $results = $this->db->resultSet();

            return $results;
        }


        public function getStaffList() {
            $this->db->query('SELECT * FROM user WHERE user.type NOT IN (:id,:id2,:id3) ');
            $this->db->bind(':id', 'Admin' );
            $this->db->bind(':id2','Customer' );
            $this->db->bind(':id3','Owner' );
            $results = $this->db->resultSet();

            return $results;
        }
        
        public function getStaffListDetails($id) {
        $this->db->query('SELECT user.UserId, user.First_Name, user.Last_Name, user.Gender, user.NIC, user.DOB, user.Line1, user.Line2, user.Line3, user.email, user.image, user.type, user.Created_date,user.Created_By,user.last_edit, phone.phone FROM user INNER JOIN phone ON user.UserId=phone.userId WHERE user.UserId = :id ');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
            return $results;
        }

        public function deleteStaff($id) {
         
            $this->db->query('DELETE FROM phone WHERE userId = :id1 ');
            $this->db->bind(':id1', $id);
            $results = $this->db->resultSet();
            $this->db->query('DELETE FROM user WHERE UserId = :id ');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();
            return true;
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


    }