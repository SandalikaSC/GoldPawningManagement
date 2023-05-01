<?php
class Locker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getLockerById($lockerId)
    {
        $this->db->query('SELECT * FROM locker where lockerNo=:lockerId');
        $this->db->bind(':lockerId', $lockerId);
        $results = $this->db->single();

        return $results;
    }
    public function AvailableCustomerArticles($customerId)
    {
        $this->db->query('SELECT  * FROM locker INNER JOIN reserves WHERE reserves.lockerNo=locker.lockerNo AND UserID=:userid AND No_of_Articles=1; ');
        $this->db->bind(':userid', $customerId);
        $results = $this->db->resultSet();

        return $results;
    }
    public function getAvailableLocker()
    {
        $this->db->query('SELECT * FROM locker where No_of_Articles=0');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getLockerByCustomerID($customer_id) {
        $this->db->query('SELECT * FROM reserves INNER JOIN article WHERE reserves.Article_Id=article.Article_Id AND UserID=:userId AND Retrive_status=0; ');
        $this->db->bind(':userId', $customer_id);
        $results = $this->db->resultSet();

        return $results;
    }
     
}
