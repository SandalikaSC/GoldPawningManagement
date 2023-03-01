<?php 

class auctionArticleModel extends Database{
    public function getAuctionArticles()
    {
        $sql = 'select Article_Id,Estimated_Value,Karatage,Weight,Type,image from article';
        $this->query($sql);
        $result = $this->resultSet();
        if ($this->rowCount() > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    
}
 ?>