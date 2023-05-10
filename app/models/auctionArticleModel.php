<?php

class auctionArticleModel extends Database
{
    public function getAuctionArticles()
    {
        $sql = 'select Article_Id,Estimated_Value,Karatage,Weight,Type,image from article where Article_Id in(select distinct Article_Id from pawn where Status like "A%" AND Status like "a%")';
        $this->query($sql);
        $result = $this->resultSet();
        if ($this->rowCount() > 0) {

            return $result;
        } else {
            return 0;
        }
    }


    public function viewAuctionArticle($article_id)
    {

        $sql1='select a.Article_Id,a.Estimated_Value,a.Karatage,a.Weight,a.Type,a.Karatage_Price,a.image,p.Pawn_Id,p.Pawn_Date,p.Redeemed_Date,p.End_Date,p.userId,p.Appraiser_Id,p.Officer_Id,p.auctioned_date,p.auctioned_time,p.WarningOne,p.WarningTwo,l.Loan_Id,l.Amount,l.Interest,l.Repay_Method,l.monthly_installment from article a inner join pawn p on a.Article_Id=p.Article_Id inner join loan l on p.Pawn_Id=l.Pawn_Id where a.Article_Id=?';
        $this->query($sql1);
        $this->bind(1, $article_id);
        $result1 = $this->single();

        $sql2 = 'select PID,orderId,Amount,Type,Date,Principle_Amount,Pawn_Id,allocate_Id,Employee_Id from payment where Pawn_Id in(select Pawn_Id from pawn where Article_Id=?)';
        $this->query($sql2);
        $this->bind(1, $article_id);
        $result2 = $this->resultSet();


        return array($result1, $result2);
    }


    public function filter($auctionDate,$firstDate, $secondDate, $karatage, $type, $minWeight, $maxWeight)
    {

        // Build the query based on the submitted form data
        $sql = 'select a.Article_Id,a.Estimated_Value,a.Karatage,a.Weight,a.Type,a.image,p.Pawn_Id,p.Pawn_Date,p.Redeemed_Date,p.End_Date,p.auctioned_date,p.Article_Id,p.userId from article a inner join pawn p on a.Article_Id = p.Article_Id where p.Status like "a%" AND  p.Status like "A%"';

        if (!empty($auctionDate)) {

            $sql .= " AND p.auctioned_date = '$auctionDate'";
        }
        if (!empty($firstDate)) {

            $sql .= " AND p.Pawn_Date >= '$firstDate'";
        }
        if (!empty($secondDate)) {

            $sql .= " AND p.Pawn_Date <= '$secondDate'";
        }

        if (!empty($karatage)) {
            $sql .= " AND a.Karatage = '$karatage'";
        }

        if (!empty($type)) {
            $sql .= " AND a.Type = '$type'";
        }

        if (!empty($minWeight)) {

            $sql .= " AND a.Weight >= $minWeight";
        }

        if (!empty($maxWeight)) {

            $sql .= " AND a.Weight <= $maxWeight";
        }




        $this->query($sql);

        $result = $this->resultSet();
        if (!empty($result)) {
            return $result;
        } else {
            return 0;
        }
    }
}
