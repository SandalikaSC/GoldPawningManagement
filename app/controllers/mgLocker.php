<?php
class mgLocker extends controller
{

   //to load all lockers
   public function index()
   {

      isLoggedIn();
      $lockers = $this->model("lockerModel")->loadLockers();
      $allocated = 0;
      $locker_count = 0;
      if ($lockers) {
         foreach ($lockers as $row) {  //count no of lockers 
            $locker_count++;
            if ($row->No_of_Articles > 0) { //count allocated lockers
               $allocated++;
            }
         }
      }

      $remaining = $locker_count - $allocated;  //count remaining lockers
      $this->view("/Manager/locker_dashboard", array($lockers, $locker_count, $allocated, $remaining));
   }


   //to compare the date
   public function dateComp($date, $days_to_add = 0)  
   {
      $currentDate = new DateTime(date('Y-m-d'));

      $givenDate = new DateTime($date);
      $givenDate->modify("+$days_to_add day"); // Add days to the starting date

      if ($currentDate >= $givenDate) {
         return true;
      } else {
         return false;
      }
   }

   //view inside the locker
   public function viewLockerItems($locker_id)
   {
      isLoggedIn();
      $locker_details = $this->model("lockerModel")->viewLocker($locker_id);
      $this->view("/Manager/viewLockerItems", $locker_details);
   }

   //view article details inside the locker
   public function viewLockerArticles($lockerNo, $articleId)
   {
      isLoggedIn();
      $lockerArticle = $this->model("lockerModel")->viewLockerArticle($lockerNo, $articleId);
      $lockerArticle[] = $lockerNo;
      $this->view("/Manager/viewLockerArticle", $lockerArticle);
   }
}
