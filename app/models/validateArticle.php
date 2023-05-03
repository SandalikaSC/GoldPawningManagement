<?php
class validateArticle
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addValidation($data)
    {
        $this->db->query('INSERT INTO validation_articles (image,status,article_type, customer, pawn_officer_or_vault_keeper,gold_appraiser,validation_status) 
            VALUES(:image,:status,:article_type, :customer, :pawn_officer_or_vault_keeper,:gold_appraiser,:validation_status)');

        // Bind values

        $this->db->bind(':image', $data['image']);
        $this->db->bind(':status', 0);
        $this->db->bind(':article_type', $data['article_type']);
        $this->db->bind(':customer', $data['customerId']);
        $this->db->bind(':gold_appraiser', 'GA001');
        $this->db->bind(':pawn_officer_or_vault_keeper', $_SESSION['user_id']);
        $this->db->bind(':validation_status', 0);



        // Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function getValidateArticles()
    {
        $this->db->query('SELECT *, count(customer) as no_Articles FROM `validation_articles` WHERE pawn_officer_or_vault_keeper like "VK%" AND customer 
        not in(select customer FROM validation_articles where pawn_officer_or_vault_keeper like "VK%" AND status= 0) GROUP by customer;');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getvalidArticles($customer)
    {
        $this->db->query('SELECT * FROM validation_articles where customer=:customer AND pawn_officer_or_vault_keeper like "VK%" AND validation_status= 1');
        $this->db->bind(':customer', $customer);
        $results = $this->db->resultset(); 
        return $results;


    }
    public function getInvalidArticles($customer)
    {

        $this->db->query('SELECT * FROM validation_articles where customer=:customer AND pawn_officer_or_vault_keeper like "VK%" AND validation_status= 0');
        $this->db->bind(':customer', $customer);
        $results = $this->db->resultset(); 
        return $results;
    }
    public function deleteValidation($id)
    {

        $this->db->query('Delete FROM validation_articles where id=:id');
        $this->db->bind(':id', $id);
       
        return $this->db->execute();
    }
}
