 <?php
class interest
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
    
    public function getInterest(){
        $this->db->query('SELECT * FROM interest');  
            $row = $this->db->single(); 
            return $row;
    }
    public function getAllocationInterest(){
        $this->db->query('SELECT * FROM interest where interest_ID=2');  
            $row = $this->db->single(); 
            return $row;
    }
    public function getFine(){
        $this->db->query('SELECT * FROM interest where interest_ID=3');  
            $row = $this->db->single(); 
            return $row;
    }
}
?>