<?php

class MgDashboardModel extends Database{
    public function loadGoldRates(){
        $sql1 = 'select Karatage, Price from gold_rate';

        $this->query($sql1);

        $result1 = $this->resultSet();

        return $result1;
    }
}



?>