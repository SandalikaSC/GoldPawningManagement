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
}
