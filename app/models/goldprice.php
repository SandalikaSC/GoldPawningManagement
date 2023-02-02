<?php
class goldprice
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getGoldRates(){
        $this->db->query('SELECT * FROM gold_rate');

            $results = $this->db->resultSet();

            return $results;

    }
    public function getRate($rateid){
        $this->db->query('SELECT * FROM gold_rate WHERE Rate_Id = :rateid');
            $this->db->bind(':rateid', $rateid);

            $row = $this->db->single();

            return $row;
    }
    public function EditGoldRate($data){
        $this->db->query('UPDATE `gold_rate` SET Price = :newPrice WHERE Karatage = :Karatage');
        
        $this->db->bind(':Karatage', $data['Karat']);
        $this->db->bind(':newPrice', $data['newprice']);

        if($this->db->execute()){
            return true;
        }else
        {
            return false;
        }
        


    }
}