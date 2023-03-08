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


    public function viewAuctionArticle($id)
    {

        $sql = 'select Article_Id,Estimated_Value,Karatage,Weight,Type,image from article where Article_Id=?';
        $this->query($sql);
        $this->bind(1, $id);
        $result = $this->single();

        $sql1 = 'select Pawn_Id,Pawn_Date,Redeemed_Date,End_Date,Article_Id,userId,Appraiser_Id,Officer_Id from pawn where Article_Id=?';
        $this->query($sql1);
        $this->bind(1, $id);
        $result1 = $this->single();

        $sql2 = 'select PID,Amount,Type,Date,Remarks,Pawn_Id,allocate_Id from payment where Pawn_Id in(select Pawn_Id from pawn where Article_Id=?)';
        // $sql1 ='select p.Pawn_Id,p.Status,p.Pawn_Date,p.Redeemed_Date,p.End_Date,p.Article_Id,p.userId,p.Appraiser_Id,p.Officer_Id,pt.PID,pt.Amount,pt.Type,pt.Date,pt.Remarks,pt.Pawn_Id,pt.allocate_Id from pawn p left join payment pt on p.Pawn_Id=pt.Pawn_Id where p.Article_Id=?';
        $this->query($sql2);
        $this->bind(1, $id);
        $result2 = $this->resultSet();


        return array($result, $result1, $result2);
    }


    public function filter($firstDate, $secondDate, $karatage, $type, $minWeight, $maxWeight)
    {

        // Build the query based on the submitted form data
        $sql = 'select a.Article_Id,a.Estimated_Value,a.Karatage,a.Weight,a.Type,a.image,p.Pawn_Id,p.Pawn_Date,p.Redeemed_Date,p.End_Date,p.Article_Id,p.userId from article a inner join pawn p on a.Article_Id = p.Article_Id where p.Status like "a%" AND  p.Status like "A%"';

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
