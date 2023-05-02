<?php
class mgPawnArticles extends controller
{
   public function __construct()
   {
      flashMessage();
   }

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

         $this->view("/Manager/pawnArticle_Dashboard", array($result, $count, $noOfEmails));
      } else {
         $result = 0;
         $this->view("/Manager/pawnArticle_Dashboard", array($result, 0, 0));
      }
   }


   public function dateCompareForEmail($date, $days_to_sub = 0)
   {
      $currentDate = new DateTime(date('Y-m-d'));

      $givenDate = new DateTime($date);
      $givenDate->modify("-$days_to_sub day"); // substract days to the starting date


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
      foreach ($result[1] as $row) {
         $sum = $sum + $row->Amount;
      }
      $result[] = $sum;

      $this->view("/Manager/viewPawnedItem", $result);
   }


   public function sendWarningEmails()
   {
      $pawn = $this->model("pawnArticleModel");
      $result = $pawn->loadPawnArticles();

      if ($result) {
         $flag = 0;
         foreach ($result as $row) {
            if ($this->dateCompareForEmail($row->End_Date, 30) and $row->WarningOne == 0) {
               $useremail = $this->model("pawnArticleModel");
               $email = $useremail->findUserEmail($row->userId);
               $sms = "Note: Only One Month Left";
               $useremail = null;

               $abc = sendMail($email->email, "warning", $sms, "V O G U E");
               if ($abc == null) {
                  $flag = 1;
                  flashMessage("Network Error Occurd..");
                  echo "Done";
                  break;
               } else {
                  $warning = $this->model("pawnArticleModel")->updateStatus($row->Pawn_Id,30);
               }
            } else if ($this->dateCompareForEmail($row->End_Date, 0) and $row->WarningTwo == 0) {
               $useremail = $this->model("pawnArticleModel");
               $email = $useremail->findUserEmail($row->userId);
               $sms = "Note: Today is the End Date For Your Pawn";
               $useremail = null;

               $abc = sendMail($email->email, "warning", $sms, "V O G U E");
               if ($abc == null) {
                  $flag = 1;
                  flashMessage("Network Error Occurd..");
                  echo "DONE";
                  break;
               } else {
                  $warning = $this->model("pawnArticleModel")->updateStatus($row->Pawn_Id,0);
               }
            }
         }
         if (!$flag) {
            echo "DONE";
            flashMessage("Warnings Sent Successfully");
         }
      } else {
         echo "DONE";
         flashMessage("No Articles Pawned to send emails");
      }
   }





   public function addToAuction()
   {
      $pawn = $this->model("pawnArticleModel");
      $result = $pawn->loadPawnArticles();
      if ($result) {
         $flag = 0;
         foreach ($result as $row) {
            if (!($this->dateCompare($row->End_Date, 14))) {
               $useremail = $this->model("pawnArticleModel");
               $email = $useremail->findUserEmail($row->userId);
               $sms = "Your Article was added to Auction";
               $useremail = null;

               if (sendMail($email->email, "pawn_to_auction", $sms, "V O G U E")) {
                  $today = date('Y-m-d'); // Get today's date
                  $auction_date = date('Y-m-d', strtotime($today . ' + 7 days')); // Add 7 days to today's date
                  $auction = $this->model("pawnArticleModel");
                  $row = $auction->pawnToAuction($row->Pawn_Id, $auction_date);
                  $auction = null;
               } else {
                  $flag = 1;
                  flashMessage("Network Error Occurd..");
                  echo "DONE";
                  break;
               }
            }
         }
         if (!$flag) {
            echo "DONE";
            flashMessage("Added to Auction Successfully");
         }
         // redirect('/mgPawnArticles/index');
      } else {
         echo "DONE";
         flashMessage("No Articles Pawned to add Auction");
         // redirect('/mgPawnArticles/index');
      }
   }





   public function addOneByOneToAuction($pawnid, $End_Date, $userId)
   {
      
      $isComplete =$this->model("pawnArticleModel")->isCompleted($pawnid);
      if (!($this->dateCompare($End_Date, 14)) and !$isComplete ) {
         $pawn1 = $this->model("pawnArticleModel")->checkStatus($pawnid);
         if ($pawn1) {
            echo "DONE";
            flashMessage("Already In Auction");
            // redirect('/mgPawnArticles/viewPawnedItem/' . $Article_Id);
         } else {
            $useremail = $this->model("pawnArticleModel");
            $email = $useremail->findUserEmail($userId);
            $sms = "Your Article was added to Auction";
            $sms = "Your Article was added to Auction";
            if (sendMail($email->email, "pawn_to_auction", $sms, "V O G U E")) {
               $today = date('Y-m-d'); // Get today's date
               $auction_date = date('Y-m-d', strtotime($today . ' + 7 days'));
               $pawn2 = $this->model("pawnArticleModel")->pawnToAuction($pawnid, $auction_date);
               echo "DONE";
               flashMessage("Added to Auction Successfully");
            } else {
               echo "fail";
               flashMessage("Network Error Occurd..");
            }
            // redirect('/mgPawnArticles/viewPawnedItem/' . $Article_Id);
         }
      }
   }


   public function sendOneByOneWarning($userId, $End_Date,$pawnid,$warning1,$warning2)
   {
      if ($this->dateCompareForEmail($End_Date, 0) and $warning2==0 ) {
         $useremail = $this->model("pawnArticleModel");
         $email = $useremail->findUserEmail($userId);

         $sms = "Note: Today is the End Date For Your Pawn";
         $abc = sendMail($email->email, "warning", $sms, "V O G U E");
         if ($abc == null) {
            flashMessage("Network Error Occurd..");
            echo "DONE";
         } else {
            $warning = $this->model("pawnArticleModel")->updateStatus($pawnid,0);
            echo "DONE";
            flashMessage("Warning Sent Successfully");
         }
      } else if ($this->dateCompareForEmail($End_Date, 30) and $warning1==0) {
         $useremail = $this->model("pawnArticleModel");
         $email = $useremail->findUserEmail($userId);
         $sms = "Note: Only One Month Left";


         $abc = sendMail($email->email, "warning", $sms, "V O G U E");
         if ($abc == null) {
            flashMessage("Network Error Occurd..");
            echo "DONE";
         } else {
            $warning = $this->model("pawnArticleModel")->updateStatus($pawnid,30);
            echo "DONE";
            flashMessage("Warning Sent Successfully");
         }
      // } else {
      //    echo "DONE";
      //    flashMessage("Warning Sent Successfully");
      // }
      }
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

         $this->view("/Manager/pawnArticle_Dashboard", array($res, $count, $noOfEmails));
      } else {
         $this->view("/Manager/pawnArticle_Dashboard", array($res, 0, 0));
      }
   }
}
