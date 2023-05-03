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
        $this->db->query('SELECT  * FROM locker INNER JOIN reserves WHERE reserves.lockerNo=locker.lockerNo AND UserID=:userid AND No_of_Articles=1 AND Retrive_status!=1; ');
        $this->db->bind(':userid', $customerId);
        $result = $this->db->resultSet();

        return $result;
    }
    public function getAvailableLocker()
    {
        $this->db->query('SELECT * FROM locker where No_of_Articles=0');
        $results = $this->db->resultSet();

        return $results;
    }
    public function countLockerAvailable()
    {
        $this->db->query('SELECT count(lockerNo) as lockers FROM locker where No_of_Articles=0');
        $result = $this->db->single();

        return $result->lockers;
    }
    public function updateLockerArticles($lockerNo){
        $this->db->query('UPDATE locker SET No_of_Articles =No_of_Articles+1 , Status="Not Available" WHERE lockerNo = :LockerNo');
        
        $this->db->bind(':LockerNo', $lockerNo); 

        if($this->db->execute()){
            return true;
        }else
        {
            return false;
        }
    }
     
}
