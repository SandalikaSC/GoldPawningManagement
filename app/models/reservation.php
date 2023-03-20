<?php
class reservation
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
    public function getReservationByUserID($userId) {
        $this->db->query('SELECT * FROM reserves INNER JOIN article ON article.Article_Id=reserves.Article_Id JOIN locker On locker.lockerNo=reserves.lockerNo where userId=:userid');
        $this->db->bind(':userid', $userId);
        $results = $this->db->resultSet();

        return $results;
    }
    public function getReservation($reserveId) {
        $this->db->query('SELECT * FROM reserves where Allocate_ID=:allocate');
        $this->db->bind(':allocate', $reserveId);
        $results = $this->db->single();

        return $results;
    }
}
?>