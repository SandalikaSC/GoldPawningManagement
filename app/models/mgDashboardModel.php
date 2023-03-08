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
        $sql = 'select CID,Date,Description,UserID from complaint order by CID desc';
        $this->query($sql);
        $result = $this->resultSet();
        return $result;



    }


    public function deriveIncomeAndExpen(){
        // select data from the payment table
        $sql = "select  YEAR(Date) AS Year,MONTH(Date) AS Month, SUM(Amount) AS totalIncome from payment group by YEAR(Date), MONTH(Date) order by YEAR(Date) asc";
        $this->query($sql);
        $result=$this->resultSet();


        $sql2="select YEAR(p.Pawn_Date) AS Year,MONTH(p.Pawn_Date) AS Month,sum(l.Amount) AS totalExpen from loan l inner join pawn p on l.Pawn_Id=p.Pawn_Id group by YEAR(p.Pawn_Date),MONTH(p.Pawn_Date) order by YEAR(p.Pawn_Date) asc";
        $this->query($sql2);
        $result2=$this->resultSet();


        if(!empty($result) AND !empty($result2)){
            return array($result,$result2);
            
        }else{
            return 0;
        }

    }


    public function countAll(){
        $sql1 = "select count(distinct UserId) as customers from user where type='Customer'";
        $this->query($sql1);
        $CUS=$this->single();

        $sql2 = "select count(distinct UserId) as gold_appraisers from user where type='Gold Appraiser'";
        $this->query($sql2);
        $GA=$this->single();

        $sql3 = "select count(distinct UserId) as pawning_officers from user where type='Pawning Officer'";
        $this->query($sql3);
        $PO=$this->single();

        $sql4 = "select count(distinct UserId) as vault_keepers from user where type='Vault Keeper'";
        $this->query($sql4);
        $VK=$this->single();

        $sql5 = "select count(distinct Pawn_Id) as pawn_articles from pawn where Status like 'p%' AND Status like 'P%'";
        $this->query($sql5);
        $PAWN=$this->single();

        $sql6 = "select count(distinct Pawn_Id) as auction_articles from pawn where Status like 'a%' AND Status like 'A%'";
        $this->query($sql6);
        $AUC=$this->single();

        $sql7 = "select count(distinct lockerNo) as lockers from reserves";
        $this->query($sql7);
        $LC=$this->single();

        return array($CUS,$VK,$GA,$PO,$PAWN,$AUC,$LC);
    }
}
