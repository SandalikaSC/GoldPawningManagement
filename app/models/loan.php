<?php
class loan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
    
    public function getLoanByPawnId($Id) {
        $this->db->query('SELECT * FROM loan where Pawn_Id=:Pawn_Id');
        $this->db->bind(':Pawn_Id', $Id);
        $row = $this->db->single();;

        return $row;
    }
}
?>