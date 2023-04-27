<?php
    class Pawning {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPawnedItems() {
            $this->db->query('SELECT * FROM pawn INNER JOIN article ON pawn.Article_Id=article.Article_Id INNER JOIN loan ON pawn.Pawn_Id = loan.Pawn_Id;');

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

        public function getArticles() {
            $this->db->query('SELECT * FROM article;');
            $results = $this->db->resultSet();

            return $results;
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
        public function addArticleToValidate($data) {
            $this->db->query('INSERT INTO validation_articles (article_type, customer, image, pawn_officer_or_vault_keeper, gold_appraiser) VALUES(:type, :customer, :image, :pawn_officer, :gold_appraiser)');

            $this->db->bind(':type', $data['type']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':pawn_officer', $data['pawn_officer']);
            $this->db->bind(':customer', $data['customer']);
            $this->db->bind(':gold_appraiser', 'GA001');

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Get validation details of a article by using the validation ID
        public function getValidationDetailsByID($id) {
            $this->db->query('SELECT * FROM validation_articles WHERE id=:id;');

            $this->db->bind(':id', $id);
            
            $row = $this->db->single();

            return $row;
        }


        // Get customer details by using email
        public function getCustomerByEmail($email) {
            $this->db->query('SELECT * FROM user WHERE email=:email and type="Customer";');
            $this->db->bind(':email', $email);
            
            $row = $this->db->single();

            return $row;
        }


        // Get last article id
        public function getLastArticleId() {
            $sql = 'SELECT Article_Id FROM article ORDER BY Article_Id DESC';
            $this->db->query($sql);
            $result = $this->db->single();

            if(empty($result)) {
                return 'A000';
            } else {
                return $result->Article_Id;
            }
        }

        // Get customer by user_id'
        public function getCustomerByID($id) {
            $this->db->query('SELECT * FROM user INNER JOIN phone ON user.UserId=phone.userId WHERE user.UserId = :id;');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        // Get carat price by using the carat value
        public function getCaratValue($carats) {
            $this->db->query('SELECT * FROM gold_rate WHERE Karatage = :carats');

            $this->db->bind(':carats', $carats);

            $row = $this->db->single();

            return $row;
        }

        // Pawn Article
        public function pawnArticle($data) {
            $article_id = $this->getLastArticleId();
            ++$article_id;

            $gold_rates_details = $this->getCaratValue($data['validation_details']->karatage);

            $this->db->query('INSERT INTO article (Article_Id, Estimated_Value, Karatage, Weight, Type, Karatage_Price, Rate_Id, image) VALUES(:article_id, :estimated_value, :karatage, :weight, :type, :karatage_price, :rate_id, :image)');

            $this->db->bind(':article_id', $article_id);
            $this->db->bind(':estimated_value', $data['validation_details']->estimated_value);
            $this->db->bind(':karatage', $data['validation_details']->karatage);
            $this->db->bind(':weight', $data['validation_details']->weight);
            $this->db->bind(':type', $data['validation_details']->article_type);
            $this->db->bind(':rate_id', $gold_rates_details->Rate_Id);
            $this->db->bind(':karatage_price', $gold_rates_details->Price);
            $this->db->bind(':image', $data['validation_details']->image);

            if($this->db->execute()) {
                $this->db->query('INSERT INTO pawn (Status, Pawn_Date, End_Date, Article_Id, userId, Appraiser_Id, Officer_Id) VALUES(:status, :pawn_date, :end_date, :article_id, :user_id, :appraiser_id, :officer_id);');

                $this->db->bind(':status', 'Pawned');
                $this->db->bind(':pawn_date', date('Y-m-d H:i:s'));

                $end_date = date('Y-m-d', strtotime('+1 year'));

                $this->db->bind(':end_date', $end_date);      
                $this->db->bind(':article_id', $article_id);
                $this->db->bind(':user_id', $data['validation_details']->customer);
                $this->db->bind(':appraiser_id', $data['validation_details']->gold_appraiser);
                $this->db->bind(':officer_id', $data['pawn_officer']); 

                if($this->db->execute()) {
                    $pawn_details = $this->getPawnByArticleID($article_id);
                    $interest_details = $this->getInterestDetails();

                    $this->db->query('INSERT INTO loan (Amount, Interest, Repay_Method, Pawn_Id, interest_ID, monthly_installment) VALUES(:amount, :interest, :repay_method, :pawn_id, :interest_id, :monthly_installment);');
                        
                    $this->db->bind(':pawn_id', $pawn_details->Pawn_Id);
                    $this->db->bind(':amount', $data['full_loan']); 
                    $this->db->bind(':interest', $interest_details->Interest_Rate); 
                    $this->db->bind(':repay_method', $data['payment_method']); 
                    $this->db->bind(':interest_id', $interest_details->interest_ID);

                    if($data['payment_method'] == 'Fixed') {
                        $monthly_installment = (($data['full_loan'])/12.00) * (($interest_details->Interest_Rate)+100)/100;
                    } else {
                        $monthly_installment = 'NULL';
                    }

                    $this->db->bind(':monthly_installment', $monthly_installment);

                    if($this->db->execute()) {
                        $validation_id = $data['validation_details']->id;
                        $this->db->query('DELETE FROM validation_articles WHERE id=:id;');
                        $this->db->bind(':id', $validation_id);

                        if($this->db->execute()) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }


        // Delete a record from validation_articles table using id
        public function deleteValidatedArticle($id) {
            $this->db->query('DELETE FROM validation_articles WHERE id=:id;');

            $this->db->bind(':id', $id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        // Get new interest details
        public function getInterestDetails() {
            $this->db->query('SELECT * FROM interest WHERE interest_ID = 1;');

            $row = $this->db->single();

            return $row;
        }

        public function getPawnByArticleID($id) {
            $this->db->query('SELECT * FROM pawn WHERE Article_Id=:id ORDER BY Pawn_Id DESC LIMIT 1;');

            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }



        //customer pawning


        public function getPawnByUserID($userId) {
            $this->db->query('SELECT * FROM pawn INNER JOIN article ON article.Article_Id=pawn.Article_Id where userId=:userid');
            $this->db->bind(':userid', $userId);
            $results = $this->db->resultSet();

            return $results;
        }

        public function goldLoanDetails($id) {
            $this->db->query(' SELECT * FROM pawn  JOIN loan ON pawn.Pawn_Id = loan.Pawn_Id
                             JOIN   article ON article.Article_Id=pawn.Article_Id where pawn.Pawn_Id=:id ');
            $this->db->bind(':id', $id);

            $row =$this->db->single();

            return $row;
        }


    }