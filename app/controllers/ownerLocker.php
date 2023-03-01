<?php
class ownerLocker extends controller
{

   public function index()
   {

      isLoggedIn();
      $this->view("/Owner/ownerLockerDashboard");
   }

   public function viewAuctionItem(){
      isLoggedIn();
      $this->view("/Owner/viewLockerItem");
      
   }
}