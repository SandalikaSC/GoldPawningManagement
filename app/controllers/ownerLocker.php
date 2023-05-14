<?php
class ownerLocker extends controller
{
   //to load all lockers into owner locker dashboard.
   public function index()
   {

      isLoggedIn();
      $lockers = $this->model("lockerModel")->loadLockers();
      $allocated = 0;
      $locker_count = 0;
      if ($lockers) {
         foreach ($lockers as $row) {
            $locker_count++; //count the all lockers
            if ($row->No_of_Articles > 0) {  //count the reserved lockers
               $allocated++;
            }
         }
      }

      $remaining = $locker_count - $allocated;  //count the reserved lockers
      $this->view("/Owner/ownerLockerDashboard", array($lockers, $locker_count,$allocated, $remaining));
   }

   //to view inside the locker
   public function viewLockerItems($locker_id)
   {
      isLoggedIn();
      $locker_details = $this->model("lockerModel")->viewLocker($locker_id);
      $this->view("/Manager/viewLockerItems", $locker_details);
   }

   //to view all article details inside some locker
   public function viewLockerArticles($lockerNo, $articleId)
   {
      isLoggedIn();
      $lockerArticle = $this->model("lockerModel")->viewLockerArticle($lockerNo, $articleId);
      $lockerArticle[] = $lockerNo;
      $this->view("/Manager/viewLockerArticle", $lockerArticle);
   }
}
