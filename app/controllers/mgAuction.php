<?php
class mgAuction extends controller
{

   public function index($msg = null)
   {

      isLoggedIn();

      // $auction = $this->model("auctionArticleModel");
      // $result = $auction->getAuctionArticles();
      // $this->view("auction_dashboard", array($result, $msg));
      $this->view("/Manager/auction_dashboard");
   }
}
