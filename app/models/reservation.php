<?php
class reservation
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getReservationByUserID($userId)
    {
        $this->db->query('SELECT * FROM reserves INNER JOIN article ON article.Article_Id=reserves.Article_Id JOIN locker On locker.lockerNo=reserves.lockerNo where userId=:userid');
        $this->db->bind(':userid', $userId);
        $results = $this->db->resultSet();

        return $results;
    }
    public function getReservation($reserveId)
    {
        $this->db->query('SELECT * FROM reserves where Allocate_ID=:allocate');
        $this->db->bind(':allocate', $reserveId);
        $results = $this->db->single();

        return $results;
    }
    public function countTodayAllocation()
    {
        $this->db->query('SELECT count(Allocate_Id) as todayAllocation FROM reserves where Date=:Date');
        $this->db->bind(':Date', date("Y-m-d"));
        $result = $this->db->single();

        return $result->todayAllocation;
    }
    public function lockerExtend($date, $reservationId)
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
    public function updateFinePaid($date, $reservationId)
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
    } public function getLockerReservation($locker,$customer){

        $this->db->query('SELECT * FROM reserves where lockerNo=:lockerNo AND UserID=:UserID And Retrive_status=:Retrive_Status;');
        $this->db->bind(':lockerNo', $locker);
        $this->db->bind(':UserID', $customer);
        $this->db->bind(':Retrive_Status', 0);
        $results = $this->db->single();

        return $results;
        
    }
    public function addLockerReserved($data, $articleId)
    {
        $reservation=$this->getLockerReservation($data['lockerNo'],$data['customer']);
        $this->db->query('INSERT INTO reserves(Retrieve_Date,Retrive_status,Article_Id,allocation_fee,lockerNo,UserID,Keeper_Id,appraiser_Id) 
        VALUES(:Retrieve_Date,:Retrive_Status,:Article_Id,:allocation_fee,:lockerNo,:UserID,:Keeper_Id,:appraiser_Id )');

        // Bind values

        
        $this->db->bind(':Retrieve_Date', $reservation->Retrieve_Date);
        $this->db->bind(':Retrive_Status',0);
        $this->db->bind(':Article_Id', $articleId);
        $this->db->bind(':allocation_fee', $reservation->allocation_fee);
        $this->db->bind(':lockerNo',  $data['lockerNo']);
        $this->db->bind(':UserID', $data['customer']);
        $this->db->bind(':Keeper_Id', $data['pawn_officer_or_vault_keeper']);
        $this->db->bind(':appraiser_Id', $data['gold_appraiser']);

        // Execute
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function addNewReservation($data, $articleId,$retrieveDate,$payment)
    {
         
        $this->db->query('INSERT INTO reserves(Retrieve_Date,Retrive_status,Article_Id,allocation_fee,lockerNo,UserID,Keeper_Id,appraiser_Id) 
        VALUES(:Retrieve_Date,:Retrive_Status,:Article_Id,:allocation_fee,:lockerNo,:UserID,:Keeper_Id,:appraiser_Id )');

        // Bind values

        
        $this->db->bind(':Retrieve_Date', $retrieveDate);
        $this->db->bind(':Retrive_Status',0);
        $this->db->bind(':Article_Id', $articleId);
        $this->db->bind(':allocation_fee', $payment);
        $this->db->bind(':lockerNo',  $data['lockerNo']);
        $this->db->bind(':UserID', $data['customer']);
        $this->db->bind(':Keeper_Id', $data['pawn_officer_or_vault_keeper']);
        $this->db->bind(':appraiser_Id', $data['gold_appraiser']);

    
        // Execute
        if ($this->db->execute()) {

           $reserve= $this->getLockerReservation($data['lockerNo'],$data['customer']); 

            return $reserve->Allocate_Id;
        } else {
            return false;
        }
    }

    public function countCurrentArticles(){
        $this->db->query('SELECT count(Allocate_Id) as currentArticles FROM reserves where Retrive_status=:Retrive_Status;'); 
        $this->db->bind(':Retrive_Status', 0);
        $results = $this->db->single();

        return $results->currentArticles;
    }
}
