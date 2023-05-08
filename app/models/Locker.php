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
    public function getAllLockers()
    {
        $this->db->query('SELECT * FROM locker');
        $results = $this->db->resultSet();

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
 

    public function getLockerByCustomerID($customer_id) {
        $this->db->query('SELECT * FROM reserves INNER JOIN article WHERE reserves.Article_Id=article.Article_Id AND UserID=:userId AND Retrive_status=0; ');
        $this->db->bind(':userId', $customer_id);
        $results = $this->db->resultSet();

        return $results;
    }
     
 
    public function countLockerAvailable()
    {
        $this->db->query('SELECT count(lockerNo) as lockers FROM locker where No_of_Articles!=2');
        $result = $this->db->single();

        return $result->lockers;
    }
    public function countLockerReserved()
    {
        $this->db->query('SELECT count(lockerNo) as lockers FROM locker where No_of_Articles!=0');
        $result = $this->db->single();

        return $result->lockers;
    }
    public function countAllLocker()
    {
        $this->db->query('SELECT count(lockerNo) as lockers FROM locker');
        $result = $this->db->single();

        return $result->lockers;
    }
    public function countDeliverd()
    {
        $this->db->query('SELECT count(lockerNo) as lockers FROM locker where No_of_Articles=0');
        $result = $this->db->single();

        return $result->lockers;
    }

    public function updateLockerArticles($lockerNo, $status)
    {

        if ($status == "Available") {
            $this->db->query('UPDATE locker SET No_of_Articles =No_of_Articles+1 ,Key_Status=1,Key_released_Date=:Date, Status=:Status WHERE lockerNo = :LockerNo');
            $this->db->bind(':Date', date('Y-m-d'));
        } else {
            $this->db->query('UPDATE locker SET No_of_Articles =No_of_Articles+1 , Status=:Status WHERE lockerNo = :LockerNo');
        }



        // $this->db->query('UPDATE locker SET No_of_Articles =No_of_Articles+1 ,Key_Status=1, Status=:Status WHERE lockerNo = :LockerNo');
        $this->db->bind(':Status', $status);
        $this->db->bind(':LockerNo', $lockerNo);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function ReleaseArticleLocker($lockerNo)
    { 
        $this->db->query('UPDATE locker SET No_of_Articles =No_of_Articles-1 ,Status=:Status WHERE lockerNo = :LockerNo');
       
        $this->db->bind(':LockerNo', $lockerNo);
        $this->db->bind(':Status', "Available");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function DeAllocateLocker($lockerNo)
    { 
        $this->db->query('UPDATE locker SET No_of_Articles =0,Key_released_Date=null, Key_Status=0,Status=:Status WHERE lockerNo = :LockerNo');
       
        $this->db->bind(':LockerNo', $lockerNo);
        $this->db->bind(':Status', "Available");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
 
}
