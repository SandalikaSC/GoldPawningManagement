<?php
class loan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    } 
    
    public function getLoanByPawnId($Id) {
        $this->db->query('SELECT * FROM loan where Pawn_Id=:Pawn_Id');
        $this->db->bind(':Pawn_Id', $Id);
        $row = $this->db->single();;

        return $row;
    }
    public function insertRepawnLoan($loan)
    {
 
        $this->db->query('INSERT INTO loan(`Amount`, `Interest`, `Repay_Method`, `Pawn_Id`, `interest_ID`, `monthly_installment`)  
        VALUES (:Amount, :Interest, :Repay_Method, :Pawn_Id, :interest_ID, :monthly_installment)');
        $this->db->bind(':Amount', floatval($loan['Amount']));
        $this->db->bind(':Interest', $loan['Interest']);
        $this->db->bind(':Repay_Method', $loan['Repay_Method']);
        $this->db->bind(':Pawn_Id', $loan['Pawn_Id']);
        $this->db->bind(':interest_ID', $loan['interest_ID']);
        $this->db->bind(':monthly_installment', $loan['monthly_installment']);


        if ($this->db->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
}
?>