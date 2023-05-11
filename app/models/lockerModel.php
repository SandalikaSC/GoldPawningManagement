<?php 
class lockerModel extends Database{

public function loadLockers(){
    $sql='select lockerNo,Status,Key_Status,No_of_Articles from locker';
    $this->query($sql);
    $lockers=$this->resultSet();
    if($lockers){
        return $lockers;
    }else{
        return 0;
    }
    
}

public function viewLocker($lockerNo){
    $sql1='select l.lockerNo,l.Status,l.No_of_Articles,l.Key_Status,l.Key_released_Date,r.Allocate_Id,r.Date,r.Retrieve_Date,r.Retrive_status,r.finePaidTill,r.Deallocated_Date,r.Article_Id,r.allocation_fee,r.UserID,r.Keeper_Id,r.appraiser_Id from locker l inner join reserves r on l.lockerNo=r.lockerNo where l.lockerNo=? and r.Retrive_status=?';
    $this->query($sql1);
    $this->bind(1,$lockerNo);
    $this->bind(2,0);
    $locker=$this->resultSet();
   
    $sql2='select PID,Amount,Type,Date,Principle_Amount from payment where allocate_Id in(select Allocate_Id from reserves where lockerNo=? order by Allocate_Id desc)';
    $this->query($sql2);
    $this->bind(1,$lockerNo);
    $locker_payments=$this->resultSet();

    $sql3='select a.image,r.Article_Id from article a inner join reserves r on a.Article_Id=r.Article_Id where r.Article_Id in(select Article_Id from reserves where lockerNo=? and Retrive_status=?)';
    $this->query($sql3);
    $this->bind(1,$lockerNo);
    $this->bind(2,0);
    $article_image=$this->resultSet();

    return array($locker,$locker_payments,$article_image);
}

public function viewLockerArticle($lockerNo,$articleId){

    $sql1='select a.Article_Id,a.Estimated_Value,a.Karatage,a.Weight,a.Type,a.image,r.Allocate_Id,r.Date,r.Retrieve_Date,r.allocation_fee,r.UserID,r.Keeper_Id,r.appraiser_Id from article a inner join reserves r on a.Article_Id=r.Article_Id where r.Article_Id=? and r.lockerNo=?';
    $this->query($sql1);
    $this->bind(1,$articleId);
    $this->bind(2,$lockerNo);
    $locker_article=$this->single();

    $sql2='select PID,Amount,Type,Date,Principle_Amount from payment where allocate_Id in(select Allocate_Id from reserves where lockerNo=? and Article_Id=? order by Allocate_Id desc)';
    $this->query($sql2);
    $this->bind(1,$lockerNo);
    $this->bind(2,$articleId);
    $locker_payments=$this->resultSet();

    return array($locker_article,$locker_payments);
}


}


?>