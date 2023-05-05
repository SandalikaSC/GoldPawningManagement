<?php
class delivery
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDeliveryByReserveId($reserveId) {
        $this->db->query('SELECT * FROM delivery where Allocate_Id=:reserveId');
        $this->db->bind(':reserveId', $reserveId);
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
}