<?php

class MgDashboardModel extends Database
{
    public function loadGoldRates()
    {

        $sql1 = 'select Karatage, Price from gold_rate';
        $this->query($sql1);
        $result = $this->resultSet();

        return $result;
    }

    public function loadInterest()
    {
        $sql = 'select Interest_Rate from interest order by interest_ID desc limit 1';
        $this->query($sql);
        $result = $this->single();
        return $result;
    }

    public function loadComplaints()
    {
        // $sql = 'select CID,Date,Description,UserID,Status from complaint order by CID desc';
        $sql = 'select c.CID,c.Date,c.Description,c.UserID,c.Status,concat(u.First_Name," ",u.Last_Name) as Name,u.image from complaint c inner join user u on c.UserID=u.UserId order by c.Date';
        $this->query($sql);
        $result = $this->resultSet();
        return $result;
    }


    public function deriveIncomeAndExpen()
    {

        $year = date('Y');

        $sql = "select  YEAR(Date) AS Year,MONTH(Date) AS Month, SUM(Amount) AS totalIncome from payment where YEAR(Date) = ? group by YEAR(Date), MONTH(Date) order by MONTH(Date) asc";
        $this->query($sql);
        $this->bind(1, $year);
        $result = $this->resultSet();


        $sql2 = "select YEAR(p.Pawn_Date) AS Year,MONTH(p.Pawn_Date) AS Month,sum(l.Amount) AS totalExpen from loan l inner join pawn p on l.Pawn_Id=p.Pawn_Id where YEAR(p.Pawn_Date)=? group by YEAR(p.Pawn_Date),MONTH(p.Pawn_Date) order by MONTH(p.Pawn_Date) asc";
        $this->query($sql2);
        $this->bind(1, $year);
        $result2 = $this->resultSet();


        if (!empty($result) and !empty($result2)) {
            return array($result, $result2);
        } else {
            return 0;
        }
    }

    public function deriveIncomeAndExpenInGivenYear($year)
    {
        $sql = "select  YEAR(Date) AS Year,MONTH(Date) AS Month, SUM(Amount) AS totalIncome from payment where YEAR(Date) = ? group by YEAR(Date), MONTH(Date) order by MONTH(Date) asc";
        $this->query($sql);
        $this->bind(1, $year);
        $result = $this->resultSet();


        $sql2 = "select YEAR(p.Pawn_Date) AS Year,MONTH(p.Pawn_Date) AS Month,sum(l.Amount) AS totalExpen from loan l inner join pawn p on l.Pawn_Id=p.Pawn_Id where YEAR(p.Pawn_Date)=? group by YEAR(p.Pawn_Date),MONTH(p.Pawn_Date) order by MONTH(p.Pawn_Date) asc";
        $this->query($sql2);
        $this->bind(1, $year);
        $result2 = $this->resultSet();


        if (!empty($result) and !empty($result2)) {
            return array($result, $result2);
        } else {
            return 0;
        }
    }


    public function countAll()
    {
        $sql1 = "select count(distinct UserId) as customers from user where type='Customer'";
        $this->query($sql1);
        $CUS = $this->single();

        $sql2 = "select count(distinct UserId) as gold_appraisers from user where type='Gold Appraiser'";
        $this->query($sql2);
        $GA = $this->single();

        $sql3 = "select count(distinct UserId) as pawning_officers from user where type='Pawning Officer'";
        $this->query($sql3);
        $PO = $this->single();

        $sql4 = "select count(distinct UserId) as vault_keepers from user where type='Vault Keeper'";
        $this->query($sql4);
        $VK = $this->single();

        $sql5 = "select count(distinct Pawn_Id) as pawn_articles from pawn where Status like 'p%' AND Status like 'P%'";
        $this->query($sql5);
        $PAWN = $this->single();

        $sql6 = "select count(distinct Pawn_Id) as auction_articles from pawn where Status like 'a%' AND Status like 'A%'";
        $this->query($sql6);
        $AUC = $this->single();

        $sql7 = "select count(distinct lockerNo) as lockers from reserves";
        $this->query($sql7);
        $LC = $this->single();

        $sql8 = "select count(Type) as online_payments from payment where Type=?";
        $this->query($sql8);
        $this->bind(1, "Online");
        $online_payments = $this->single();

        $sql9 = "select count(Type) as cash_payments from payment where Type=?";
        $this->query($sql9);
        $this->bind(1, "Cash");
        $cash_payments = $this->single();

        $sql10 = "select count(Type) as total_payments from payment";
        $this->query($sql10);
        $total_payments = $this->single();

        return array($CUS, $VK, $GA, $PO, $PAWN, $AUC, $LC, $online_payments, $cash_payments, $total_payments);
    }


    public function updateStatus($cid)
    {
        $sql = "update complaint set Status=1 where CID=?";
        $this->query($sql);
        $this->bind(1, $cid);
        $result = $this->execute();
        return $result;
    }



    public function addNote($UserId, $title, $date, $note)
    {
        $sql = 'insert into notes (UserId,Title,Date,Note) values (?,?,?,?)';

        $this->query($sql);

        $this->bind(1, $UserId);
        $this->bind(2, $title);
        $this->bind(3, $date);
        $this->bind(4, $note);

        $result = $this->execute();
        return $result;
    }

    public function viewNote($UserId, $date)
    {
        $sql = 'select Title,Note from notes where UserID=? and Date=?';
        $this->query($sql);

        $this->bind(1, $UserId);
        $this->bind(2, $date);
        $result = $this->resultSet();
        if ($this->rowCount() > 0) {
            return $result;
        } else {
            return 0;
        }
    }
}
