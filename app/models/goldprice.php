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
}