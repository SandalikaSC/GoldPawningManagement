<?php
class mgAuction extends controller
{

   public function index()
   {

      isLoggedIn();

      // $auction = $this->model("auctionArticleModel");
      // $result = $auction->getAuctionArticles();
      // $this->view("auction_dashboard", array($result, $msg));
      // $this->view("/Manager/auction_dashboard",$result);
      $this->view("/Manager/auction_dashboard");
   }

   public function viewAuctionItem(){
      isLoggedIn();
      $this->view("/Manager/viewAuctionItem");
      
   }
}
