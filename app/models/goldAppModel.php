<?php
    class goldAppModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
    }