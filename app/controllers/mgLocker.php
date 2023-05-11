<?php
class mgLocker extends controller{
    
     public function index(){

        isLoggedIn();
        $lockers=$this->model("lockerModel")->loadLockers();
        $allocated=0;
        $locker_count=0;
        if($lockers){
         foreach($lockers as $row){
            $locker_count++;
            if($row->No_of_Articles>0){
               $allocated++;
            }
         }
        }

        $remaining=$locker_count-$allocated;
        $this->view("/Manager/locker_dashboard",array($lockers,$locker_count,$allocated,$remaining));
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
?>