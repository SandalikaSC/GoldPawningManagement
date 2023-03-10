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
}