<?php
class Locker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
    public function getLockerById($lockerId) {
        $this->db->query('SELECT * FROM locker where lockerNo=:lockerId');
        $this->db->bind(':lockerId', $lockerId);
        $results = $this->db->single();

        return $results;
    }

}
?>