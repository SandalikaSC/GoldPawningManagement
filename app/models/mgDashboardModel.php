<?php

class MgDashboardModel extends Database{
    public function loadGoldRates(){
       
        $sql1 = 'select Karatage, Price from gold_rate';
        $this->query($sql1);
        $result = $this->resultSet();
        
        return $result;     
    }

    public function loadInterest(){
        $sql='select Interest_Rate from interest order by interest_ID desc limit 1';
        $this->query($sql);
        $result= $this->single();
        return $result;
    }

    public function loadComplaints(){
        $sql = 'select CID,Date,Description,UserID from complaint';
        $this->query($sql);
        $result = $this->resultSet();
        return $result;



    }
}



?>