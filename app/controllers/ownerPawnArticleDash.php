<?php
class ownerPawnArticleDash extends controller
{
  
   public function dateCompare($date, $days_to_add = 0)
   {
      $currentDate = new DateTime(date('Y-m-d'));

      $givenDate = new DateTime($date);
      $givenDate->modify("+$days_to_add day"); // Add days to the starting date

      if ($currentDate > $givenDate) {
         return false;
      } else {
         return true;
      }
   }

   public function index()
   {
      isLoggedIn();
      $pawn = $this->model("pawnArticleModel");
      $result = $pawn->loadPawnArticles();
      if ($result) {
         $count = 0;
         foreach ($result as $row) {
            if (!($this->dateCompare($row->End_Date, 14)) and $row->Status == "Pawned") {
               $count++;
            }
         }

         $noOfEmails = 0;
         foreach ($result as $row) {
            if ($this->dateCompareForEmail($row->End_Date, 30) and $row->WarningOne == 0) {
               $noOfEmails++;
            } else if ($this->dateCompareForEmail($row->End_Date, 0) and $row->WarningTwo == 0) {
               $noOfEmails++;
            }
         }

         $this->view("/Owner/ownerPawnArticlesDashboard", array($result, $count, $noOfEmails));
      } else {
         $result = 0;
         $this->view("/Owner/ownerPawnArticlesDashboard", array($result, 0, 0));
      }
   }


   public function dateCompareForEmail($date, $days_to_sub = 0)
   {
      $currentDate = new DateTime(date('Y-m-d'));

      $givenDate = new DateTime($date);
      $givenDate->modify("-$days_to_sub day"); 


      if ($currentDate == $givenDate) {
         return true;
      } else {
         return false;
      }
   }





   public function viewPawnedItem($id)
   {

      isLoggedIn();

      $pawn = $this->model("pawnArticleModel");
      $result = $pawn->viewPawnArticle($id);
      $sum = 0;
      foreach ($result[2] as $row) {
         $sum = $sum + $row->Amount;
      }
      $result[] = $sum;

      $this->view("/Owner/ownerViewPawnedItem", $result);
   }


   


   public function filter()
   {

      $minPrice = isset($_POST['min-price']) ? $_POST['min-price'] : '';
      $maxPrice = isset($_POST['max-price']) ? $_POST['max-price'] :  '';
      $createdDate = isset($_POST['created-date']) ? $_POST['created-date'] : '';
      $endDate = isset($_POST['end-date']) ? $_POST['end-date'] : '';
      $karatage = isset($_POST['karatage']) ? $_POST['karatage'] : '';
      $type = isset($_POST['type']) ? $_POST['type'] : '';
      $minWeight = isset($_POST['min-weight']) ? floatval($_POST['min-weight']) : '';
      $maxWeight = isset($_POST['max-weight']) ? floatval($_POST['max-weight']) : '';

      $pawn = $this->model("pawnArticleModel");
      $res = $pawn->filter($minPrice, $maxPrice, $createdDate, $endDate, $karatage, $type, $minWeight, $maxWeight);

      if ($res) {
         isLoggedIn();
         $pawn = $this->model("pawnArticleModel");
         $result = $pawn->loadPawnArticles();

         $count = 0;
         foreach ($result as $row) {
            if (!($this->dateCompare($row->End_Date, 14)) and $row->Status == "Pawned") {
               $count++;
            }
         }

         $noOfEmails = 0;
         foreach ($result as $row) {
            if ($this->dateCompareForEmail($row->End_Date, 30) and $row->WarningOne == 0) {
               $noOfEmails++;
            } else if ($this->dateCompareForEmail($row->End_Date, 0) and $row->WarningTwo == 0) {
               $noOfEmails++;
            }
         }

         $this->view("/Owner/ownerPawnArticlesDashboard", array($res, $count, $noOfEmails));
      } else {
         $this->view("/Owner/ownerPawnArticlesDashboard", array($res, 0, 0));
      }
   }
}
