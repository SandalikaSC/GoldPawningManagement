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
    public function countTodayAllocation() {
        $this->db->query('SELECT count(Allocate_Id) as todayAllocation FROM reserves where Date=:Date');
        $this->db->bind(':Date', date("Y-m-d"));
        $result = $this->db->single();

        return $result->todayAllocation;
    }
    public function lockerExtend($date,$reservationId)
    {
        $this->db->query('UPDATE `reserves` SET Retrieve_Date = :newdate, finePaidTill=:finePaidTill WHERE Allocate_Id = :Allocate_Id');

            // Bind values 
            $this->db->bind(':newdate', $date);
            $this->db->bind(':finePaidTill', NULL);
            $this->db->bind(':Allocate_Id', $reservationId); 

            // Execute
            if ($this->db->execute()) {

                return true;

            } else {
                return false;
            } 
    }
    public function updateFinePaid($date,$reservationId)
    {
        $this->db->query('UPDATE `reserves` SET finePaidTill=:finePaidTill WHERE Allocate_Id = :Allocate_Id');

            // Bind values  
            $this->db->bind(':finePaidTill', $date);
            $this->db->bind(':Allocate_Id', $reservationId); 

            // Execute
            if ($this->db->execute()) {

                return true;

            } else {
                return false;
            } 
    }
}
?>