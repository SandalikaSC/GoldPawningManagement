<?php
class complaint
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
     
    public function addComplaint($data)
    {  
            $this->db->query('INSERT INTO complaint (Description,UserID) 
                                VALUES(:desc,:userid)');

            // Bind values

            $this->db->bind(':desc', $data['complaint']);
            $this->db->bind(':userid', $_SESSION['user_id']); 

            // Execute
            if ($this->db->execute()) {

                return true;

            } else {
                return false;
            }


         
    }
}