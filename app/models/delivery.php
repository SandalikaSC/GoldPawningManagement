<?php
class delivery
{
    private $db; 

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDeliveryByLocker($locker)
    {
        $this->db->query('SELECT * FROM delivery where lockerNo=:locker');
        $this->db->bind(':locker', $locker);
        $results = $this->db->single();

        return $results;
    }
    public function countDeliverd()
    {
        $this->db->query('SELECT count(Deliver_Id) as count FROM delivery where Status=1');
        $result = $this->db->single();

        return $result->count;
    }
    public function countNotDeliverd()
    {
        $this->db->query('SELECT count(Deliver_Id) as count FROM delivery where Status=0');
        $result = $this->db->single();

        return $result->count;
    }
    public function deliveryByLocker($locker, $date)
    {
        $this->db->query('SELECT * FROM delivery where lockerNo=:lockerNo And DATE(added_Date)=:date');
        $this->db->bind(':lockerNo', $locker);
        $this->db->bind(':date',    explode(' ', $date)[0]);
        $results = $this->db->single();

        return $results;
    }
    public function insertDelivery($locker)
    {
        $this->db->query('INSERT INTO delivery(`Status`, `deliverd_date`, `added_Date`, `lockerNo`)VALUES(
            :Status,:deliverd_date,:added_Date,:lockerNo 
        );');
        $this->db->bind(':Status', 0);
        $this->db->bind(':deliverd_date', NULL);
        $this->db->bind(':added_Date', date('Y-m-d H:i:s'));
        $this->db->bind(':lockerNo', $locker); 
        $results = $this->db->single();

        return $results;
    }
}
