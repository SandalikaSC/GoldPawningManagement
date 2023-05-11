<?php
class ownerLocker extends controller
{
    public function index(){

        isLoggedIn();
        $lockers=$this->model("lockerModel")->loadLockers();
        $locker_count=0;
        if($lockers){
         foreach($lockers as $row){
            $locker_count++;
         }
        }

        $remaining=100-$locker_count;
        $this->view("/Owner/ownerLockerDashboard",array($lockers,$locker_count,$remaining));
     }

     public function viewLockerItems($locker_id){
       isLoggedIn();
       $locker_details=$this->model("lockerModel")->viewLocker($locker_id);
       $this->view("/Manager/viewLockerItems",$locker_details);
     }

     public function viewLockerArticles($lockerNo,$articleId){
      isLoggedIn();
      $lockerArticle=$this->model("lockerModel")->viewLockerArticle($lockerNo,$articleId);
      $lockerArticle[]=$lockerNo;
      $this->view("/Manager/viewLockerArticle",$lockerArticle);

     }
}