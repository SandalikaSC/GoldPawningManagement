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

}
?>