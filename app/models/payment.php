<?php
class payment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
    
    public function addOnlineLockerPayment($amount,$reservationId,$order_id)
    {
 
            $this->db->query('INSERT INTO payment (orderId,Amount,Type, allocate_Id) 
                                VALUES( :orderId,:Amount,:Type,:allocate_Id)');

            // Bind values 
            $this->db->bind(':orderId', $order_id);
            $this->db->bind(':Amount', $amount);
            $this->db->bind(':Type',"Online" ); 
            $this->db->bind(':allocate_Id', $reservationId);

            // Execute
            if ($this->db->execute()) {

                return true;

            } else {
                return false;
            } 
    }
    public function addCashLockerPayment($amount,$reservationId)
    {
 
            $this->db->query('INSERT INTO payment (Amount,Type,Principle_Amount, allocate_Id,Employee_Id) 
                                VALUES( :Amount,:Type,:Principle_Amount,:allocate_Id,:Employee_Id)');

            // Bind values 
            
            $this->db->bind(':Amount', $amount);
            $this->db->bind(':Type',"Cash" ); 
            $this->db->bind(':Principle_Amount',0); 
            $this->db->bind(':Employee_Id',$_SESSION['user_id'] );  
            $this->db->bind(':allocate_Id', $reservationId);

            // Execute
            if ($this->db->execute()) {

                return true;

            } else {
                return false;
            } 
    }
    public function getReservationPayments($reserveId)
    {
        $this->db->query('SELECT * FROM payment where allocate_Id=:allocate_Id');
        $this->db->bind(':allocate_Id', $reserveId);
        $results = $this->db->resultset(); 
        return $results;
    }
    public function getPawnPayments($pawnid)
    {
        $this->db->query('SELECT * FROM payment where Pawn_Id=:pawnid');
        $this->db->bind(':pawnid', $pawnid);
        $results = $this->db->resultset(); 
        return $results;
    }
    public function paidAmount($id) {
        $this->db->query(' SELECT sum(Amount)  as Paid FROM payment where Pawn_Id=:id ');
        $this->db->bind(':id', $id);

        $row =$this->db->single();

        return $row;
    }
    public function paidPrincipleAmount($id) {
        $this->db->query(' SELECT sum(Principle_Amount)  as PaidPrinciple FROM payment where Pawn_Id=:id ');
        $this->db->bind(':id', $id);

        $row =$this->db->single();

        return $row;
    }
}
?>