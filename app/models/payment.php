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
    public function getReservationPayments($reserveId)
    {
        $this->db->query('SELECT * FROM payment where allocate_Id=:allocate_Id');
        $this->db->bind(':allocate_Id', $reserveId);
        $results = $this->db->resultset(); 
        return $results;
    }
}
?>