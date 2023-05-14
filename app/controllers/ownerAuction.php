<?php
class ownerAuction extends controller
{

   public function index()
   {

      isLoggedIn();
      $this->view("/Owner/ownerAuctionDashboard");
   }

   public function viewAuctionItem(){
      isLoggedIn();
      $this->view("/Owner/viewAuctionItem");
      
   }
}